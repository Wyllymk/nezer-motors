<?php
/**
 * WhatsApp Floating Widget
 * Called via: get_template_part( 'template-parts/content/whatsapp', 'widget' )
 */

// Shared phone number
$wa_phone = '254733204672';

// Default config
$wa_name    = __( 'Nezer Motors', 'nezer-motors' );
$wa_message = __( 'Hello, I would like to enquire about your services.', 'nezer-motors' );

// Page-specific overrides
if ( is_page( 'auto-care-express' ) ) {
    $wa_name    = __( 'AutoCare Express', 'nezer-motors' );
    $wa_message = __( 'Hello, I would like to enquire about AutoCare Express services.', 'nezer-motors' );
} elseif ( is_page( 'qwik-fix' ) ) {
    $wa_name    = __( 'QuikFix', 'nezer-motors' );
    $wa_message = __( 'Hello, I would like to enquire about QuikFix services.', 'nezer-motors' );
}
?>

<div x-data="whatsappWidget({ phone: '<?php echo esc_js( $wa_phone ); ?>', defaultMsg: '<?php echo esc_js( $wa_message ); ?>' })"
    class="fixed bottom-6 right-6 z-50">
    <!-- Popup -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95" x-cloak
        class="absolute bottom-16 right-0 w-72 rounded-2xl overflow-hidden shadow-2xl"
        style="background:#1a1a2e;border:1px solid rgba(255,255,255,0.15)">
        <!-- Header -->
        <div class="px-4 py-3 flex items-center gap-3" style="background:linear-gradient(135deg,#25d366,#128c7e)">
            <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
            </div>
            <div>
                <p class="text-white font-sub font-700 text-sm"><?php echo esc_html( $wa_name ); ?></p>
                <p class="text-white/80 text-xs font-body">
                    <?php esc_html_e( 'Typically replies quickly', 'nezer-motors' ); ?></p>
            </div>
            <button @click="open = false" class="ml-auto text-white/60 hover:text-white transition-colors"
                aria-label="<?php esc_attr_e( 'Close WhatsApp chat', 'nezer-motors' ); ?>">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                </svg>
            </button>
        </div>

        <!-- Body -->
        <div class="p-4">
            <div class="rounded-xl p-3 mb-3 text-sm font-body text-white/80" style="background:rgba(255,255,255,0.08)">
                <?php esc_html_e( 'Hi! Welcome to', 'nezer-motors' ); ?> <?php echo esc_html( $wa_name ); ?>.
                <?php esc_html_e( 'How can we help you today?', 'nezer-motors' ); ?>
            </div>
            <textarea x-model="message" rows="3"
                placeholder="<?php esc_attr_e( 'Type your message...', 'nezer-motors' ); ?>"
                class="w-full rounded-xl px-3 py-2 text-sm font-body text-white placeholder-white/30 resize-none focus:outline-none focus:ring-1 focus:ring-green-500 mb-3"
                style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15)"></textarea>
            <button @click="sendWhatsApp()"
                class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                style="background:linear-gradient(135deg,#25d366,#128c7e)">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
                <?php esc_html_e( 'Send on WhatsApp', 'nezer-motors' ); ?>
            </button>
        </div>
    </div>

    <!-- FAB Button -->
    <button @click="open = !open"
        class="w-14 h-14 rounded-full flex items-center justify-center shadow-xl transition-all hover:scale-110 active:scale-95 relative"
        style="background:linear-gradient(135deg,#25d366,#128c7e)"
        :aria-label="open ? '<?php esc_attr_e( 'Close WhatsApp chat', 'nezer-motors' ); ?>' : '<?php esc_attr_e( 'Open WhatsApp chat', 'nezer-motors' ); ?>'"
        :aria-expanded="open">
        <span class="absolute inset-0 rounded-full animate-ping opacity-20" style="background:#25d366"
            aria-hidden="true"></span>
        <svg x-show="!open" class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
        <svg x-show="open" x-cloak class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"
            aria-hidden="true">
            <path
                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
        </svg>
    </button>
</div>