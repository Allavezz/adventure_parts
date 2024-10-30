setTimeout(function () {
	const flashMessage = document.getElementById('flash-message');
	if (flashMessage) {
		flashMessage.style.transition = 'opacity 0.5s ease';
		flashMessage.style.opacity = '0';

		setTimeout(function () {
			flashMessage.remove();
		}, 500);
	}
}, 5000);
