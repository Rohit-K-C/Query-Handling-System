const btn = document.getElementById('btn1');

btn.addEventListener('click', () => {
  const form = document.getElementById('bg-modal');

  if (form.style.display === 'none') {
    // 👇️ this SHOWS the form
    form.style.display = 'block';
  } else {
    // 👇️ this HIDES the form
    form.style.display = 'none';
  }
});