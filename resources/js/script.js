document.addEventListener('DOMContentLoaded', () => {
    const pushMenuBtn = document.querySelector('[data-widget="pushmenu"]');

    if (pushMenuBtn) {
        pushMenuBtn.addEventListener('click', () => {
            // Example action
            // You can add your menu toggle logic here
            const sidebar = document.querySelector('.sidebar');
            if (sidebar) {
                sidebar.classList.toggle('collapsed');
            }
        });
    }
    
});
window.addEventListener('resize', () => {
  const sidebar = document.getElementById('sidebar');
  if (window.innerWidth <= 768) {
    sidebar.classList.add('collapsed');
  } else {
    sidebar.classList.remove('collapsed');
  }
});





