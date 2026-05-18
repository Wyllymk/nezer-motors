# Nezer Motors — Contact Form Admin: Integration Guide

## Files delivered

| File | Purpose |
|---|---|
| `inc/admin-contact.php` | DB table, WP admin menu, list table, settings, AJAX handlers, cron |
| `inc/mail.php` | Email send functions + HTML templates (settings-aware, DB-logging) |
| `ajax-handler.php` | Updated `nm_contact` AJAX action with spam detection & rate limiting |

---

## 1. Load order in `functions.php`

The three files must be included **in this order** so that `nm_cs()` and
`nm_ct()` are defined before mail.php and the AJAX handler try to use them.

```php
// functions.php

// 1 — Admin panel + DB + settings helpers (defines nm_cs, nm_ct, nm_contact_log)
require_once get_template_directory() . '/inc/admin-contact.php';

// 2 — Email functions (depends on nm_cs, nm_ct from above)
require_once get_template_directory() . '/inc/mail.php';

// 3 — AJAX handler (depends on both above)
// Either paste the contents of ajax-handler.php directly here,
// or require it:
require_once get_template_directory() . '/inc/ajax-handler.php';
```

> **Remove** your old `nezer_motors_handle_contact` function and its
> `add_action( 'wp_ajax_*', ... )` calls — the new handler in
> `ajax-handler.php` replaces them completely.

---

## 2. Database table

The table `{prefix}nm_contact_submissions` is created automatically on the
first admin page load after you drop the files in. No manual SQL needed.

To force a re-install (e.g. after an upgrade), delete the option:
```php
delete_option( 'nm_contact_db_version' );
```

### Schema

| Column | Type | Notes |
|---|---|---|
| `id` | BIGINT UNSIGNED | Auto-increment PK |
| `name` | VARCHAR(100) | |
| `email` | VARCHAR(150) | |
| `phone` | VARCHAR(30) | |
| `branch` | VARCHAR(100) | |
| `vehicle` | VARCHAR(150) | |
| `message` | TEXT | |
| `ip_address` | VARCHAR(45) | IPv4 or IPv6, Cloudflare-aware |
| `user_agent` | VARCHAR(255) | |
| `referer` | VARCHAR(500) | |
| `honeypot_flag` | TINYINT(1) | 1 = honeypot was filled by bot |
| `spam_score` | TINYINT(3) | 0–10; ≥4 → status=spam |
| `status` | ENUM | new / read / replied / spam / archived |
| `admin_notes` | TEXT | Internal notes, saved from admin panel |
| `notif_sent` | TINYINT(1) | 1 = admin notification email sent |
| `reply_sent` | TINYINT(1) | 1 = customer auto-reply sent |
| `created_at` | DATETIME | |
| `updated_at` | DATETIME | |

---

## 3. Honeypot wiring

Your contact form already has the honeypot field:
```html
<div style="display:none" aria-hidden="true">
    <input type="text" name="website" tabindex="-1" autocomplete="off">
</div>
```

The field name (`website`) is the default in Settings. If you rename it,
update **Settings → Spam & Security → Honeypot Field Name** to match.

---

## 4. Admin panel

Navigate to **Contact Forms** in the WordPress sidebar.

### Submissions list
- Status tabs: All / New / Read / Replied / Spam / Archived
- Search by name, email, phone, or message content
- Filter by branch
- Bulk actions: mark status, export CSV, delete
- Inline quick-change status dropdown per row
- New submissions auto-badge in the menu

### Single submission view
- Full details including IP, spam score, user agent, referrer
- **Resend Admin Notification** button
- **Resend Auto-Reply** button
- Status selector with instant AJAX save
- Admin notes textarea with AJAX save
- IP lookup link (WhatIsMyIPAddress)
- Delete button

### Settings tabs

| Tab | Controls |
|---|---|
| General | Recipients (comma-separated), From name/email, auto-reply toggle, email subjects |
| Spam & Security | Honeypot field name, rate limiting (N per X minutes per IP), blocked emails/domains, blocked IPs, spam keywords |
| Branch Overrides | Per-branch recipient email for AutoCare Express and QwikFix |
| Advanced | Auto-delete after N days, send test email, delete all spam now |

---

## 5. Spam scoring

| Trigger | Score added |
|---|---|
| Honeypot field filled | +5 (auto-flagged as spam) |
| IP is in blocked list | +5 |
| Email matches blocked list | +5 |
| Each spam keyword matched | +2 |
| 3+ URLs in message | +2 |
| **Score ≥ 4** | → status = `spam` |

Spam submissions are **logged** but emails are **not sent** (unless you enable
"Notify admin of spam" in Settings). The customer always receives the same
success message regardless, so bots get no signal.

---

## 6. CSV export

- **Export all** button in the page header respects active filters
  (status, branch, search term)
- **Bulk export** exports only checked rows
- UTF-8 BOM included for correct Excel display
- Filename: `nm-submissions-YYYY-MM-DD-HHmmss.csv`

---

## 7. Auto-delete cron

A daily WP-Cron job (`nm_contact_cleanup`) deletes submissions older than
the configured retention period (default 90 days). Set to `0` to disable.

---

## 8. Resend emails

From the single submission view, two buttons are available:

- **Resend Admin Notification** — re-fires `nezer_motors_send_contact_email()`
  and stamps `notif_sent = 1` on success.
- **Resend Auto-Reply** — re-fires `nezer_motors_send_auto_reply()` and
  stamps `reply_sent = 1` on success.

Both respect your current settings (recipients, from name, subjects).

---

## 9. Recommended companion plugin

If WordPress mail is unreliable on your host, install **WP Mail SMTP**
(free) and configure it with your SMTP provider (Gmail, Mailgun, etc.).
The "Send Test Email" button in **Settings → Advanced** lets you verify
the mail stack is working after any configuration change.
