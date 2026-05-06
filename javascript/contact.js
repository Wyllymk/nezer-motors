/**
 * Modern Contact Form Handler with AJAX
 * Save as: assets/js/contact-form.js
 */

document.addEventListener('DOMContentLoaded', function () {
	const form = document.getElementById('contact-form');
	const submitBtn = document.getElementById('submit-btn');
	const btnText = document.getElementById('btn-text');
	const btnIcon = document.getElementById('btn-icon');

	if (!form) return;

	// Form submission handler
	form.addEventListener('submit', async function (e) {
		e.preventDefault();

		// Get form data
		const formData = new FormData(form);
		formData.append('action', 'submit_contact_form');
		formData.append('nonce', contact_ajax.nonce);

		// Validate form client-side
		if (!validateForm()) return;

		// Show loading state
		setLoadingState(true);

		try {
			const response = await fetch(contact_ajax.ajax_url, {
				method: 'POST',
				body: formData,
				credentials: 'same-origin',
			});

			const result = await response.json();

			if (result.success) {
				showMessage(result.message, 'success');
				form.reset();
				// Reset floating labels
				resetFloatingLabels();
			} else {
				showMessage(result.message, 'error');
			}
		} catch (error) {
			console.error('Form submission error:', error);
			showMessage(contact_ajax.messages.error, 'error');
		} finally {
			setLoadingState(false);
		}
	});

	// Form validation
	function validateForm() {
		const name = form.querySelector('#name').value.trim();
		const email = form.querySelector('#email').value.trim();
		const message = form.querySelector('#message').value.trim();

		// Clear previous errors
		clearFieldErrors();

		let isValid = true;

		if (!name) {
			showFieldError('name', 'Name is required');
			isValid = false;
		}

		if (!email) {
			showFieldError('email', 'Email is required');
			isValid = false;
		} else if (!isValidEmail(email)) {
			showFieldError('email', 'Please enter a valid email');
			isValid = false;
		}

		if (!message) {
			showFieldError('message', 'Message is required');
			isValid = false;
		}

		return isValid;
	}

	// Email validation
	function isValidEmail(email) {
		const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		return emailRegex.test(email);
	}

	// Show field error
	function showFieldError(fieldName, message) {
		const field = form.querySelector(`#${fieldName}`);
		const container = field.closest('.relative');

		// Add error styling
		field.classList.add('border-red-500', 'dark:border-red-400');
		field.classList.remove('border-gray-200', 'dark:border-gray-700');

		// Create error message element
		const errorDiv = document.createElement('div');
		errorDiv.className =
			'absolute -bottom-6 left-0 text-red-500 dark:text-red-400 text-sm font-medium';
		errorDiv.textContent = message;
		errorDiv.setAttribute('data-error', fieldName);

		container.appendChild(errorDiv);
	}

	// Clear field errors
	function clearFieldErrors() {
		// Remove error styling
		form.querySelectorAll('input, textarea').forEach((field) => {
			field.classList.remove('border-red-500', 'dark:border-red-400');
			field.classList.add('border-gray-200', 'dark:border-gray-700');
		});

		// Remove error messages
		form.querySelectorAll('[data-error]').forEach((error) =>
			error.remove()
		);
	}

	// Show success/error message
	function showMessage(message, type) {
		// Remove existing messages
		const existingMessages = document.querySelectorAll('.form-message');
		existingMessages.forEach((msg) => msg.remove());

		const messageDiv = document.createElement('div');
		messageDiv.className = `form-message flex items-center justify-between p-4 mb-6 rounded-2xl shadow-lg animate-fade-in ${
			type === 'success'
				? 'bg-gradient-to-r from-green-400 to-green-600 text-white'
				: 'bg-gradient-to-r from-red-400 to-red-600 text-white'
		}`;

		messageDiv.innerHTML = `
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    ${
						type === 'success'
							? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>'
							: '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>'
					}
                </svg>
                <p>${message}</p>
            </div>
            <button type="button" class="text-white hover:text-gray-200 ml-4" onclick="this.parentElement.remove()">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        `;

		form.insertBefore(messageDiv, form.firstChild);

		// Auto-hide success messages after 5 seconds
		if (type === 'success') {
			setTimeout(() => {
				if (messageDiv.parentNode) {
					messageDiv.classList.add('animate-fade-out');
					setTimeout(() => messageDiv.remove(), 300);
				}
			}, 5000);
		}
	}

	// Loading state management
	function setLoadingState(loading) {
		if (loading) {
			submitBtn.disabled = true;
			submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
			btnText.textContent = contact_ajax.messages.sending;
			btnIcon.innerHTML = `
                <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            `;
		} else {
			submitBtn.disabled = false;
			submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
			btnText.textContent = 'Send Message';
			btnIcon.innerHTML = `
                <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            `;
		}
	}

	// Reset floating labels after form reset
	function resetFloatingLabels() {
		form.querySelectorAll('input, textarea').forEach((field) => {
			field.value = '';
			field.blur();
		});
	}

	// Add real-time validation
	form.querySelectorAll('input, textarea').forEach((field) => {
		field.addEventListener('blur', function () {
			// Clear error when user starts typing
			if (this.value.trim()) {
				const errorElement = form.querySelector(
					`[data-error="${this.id}"]`
				);
				if (errorElement) {
					errorElement.remove();
					this.classList.remove(
						'border-red-500',
						'dark:border-red-400'
					);
					this.classList.add(
						'border-gray-200',
						'dark:border-gray-700'
					);
				}
			}
		});

		field.addEventListener('input', function () {
			// Clear error when user starts typing
			const errorElement = form.querySelector(
				`[data-error="${this.id}"]`
			);
			if (errorElement) {
				errorElement.remove();
				this.classList.remove('border-red-500', 'dark:border-red-400');
				this.classList.add('border-gray-200', 'dark:border-gray-700');
			}
		});
	});
});

// Add custom CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fade-out {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(-10px); }
    }
    
    .animate-fade-in {
        animation: fade-in 0.3s ease-out forwards;
    }
    
    .animate-fade-out {
        animation: fade-out 0.3s ease-out forwards;
    }
`;
document.head.appendChild(style);
