document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.popular-card');
    
    cards.forEach((card, index) => {
      setTimeout(() => {
        card.classList.add('show');
      }, index * 100)
    });
  });
  