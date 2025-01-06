const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const signUpForm = document.querySelector('.sign-up form');
const signInForm = document.querySelector('.sign-in form');
const signUpEmailInput = document.querySelector('.sign-up input[type="email"]');
const signUpPasswordInput = document.querySelector('.sign-up input[type="password"]');
const signInEmailInput = document.querySelector('.sign-in input[type="email"]');
const signInPasswordInput = document.querySelector('.sign-in input[type="password"]');
const linkedInProfileUrl = 'https://www.linkedin.com/in/imtahirnaseer';

// Show the registration form first
container.classList.add("active");

registerBtn.addEventListener('click', () => {
  container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
  container.classList.remove("active");
});

signUpForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = signUpEmailInput.value;
  const password = signUpPasswordInput.value;

  // Email validation
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    alert('Please enter a valid email address (e.g., Tahirtechlab@gmail.com or Tahir@bgsbu.in).');
    return;
  }

  // Password validation
  if (password.length < 8) {
    alert('Password must be at least 8 characters long.');
    return;
  }

  // Save the login information in local storage
  localStorage.setItem('email', email);
  localStorage.setItem('password', password);
  // Switch to login form after registration
  container.classList.remove("active");
//   alert('Registration successful. Please log in.');
});

signInForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = signInEmailInput.value;
  const password = signInPasswordInput.value;

  // Check if the user is already registered
  const storedEmail = localStorage.getItem('email');
  const storedPassword = localStorage.getItem('password');

  if (email === storedEmail && password === storedPassword) {
    window.location.href = linkedInProfileUrl;
  } else {
    alert('Invalid email or password. Please try again.');
  }
});