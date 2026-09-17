const params = new URLSearchParams(window.location.search);
const displayName = params.get('name') || 'student';

// Student exercise: determine whether the value is safe for this DOM sink.
document.querySelector('#welcome').innerHTML = `Welcome, ${displayName}!`;
