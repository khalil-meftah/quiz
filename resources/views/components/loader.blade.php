<div>
  <style>
    #loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: var(--secondary);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
    }

    .loader {
      border: 7px solid var(--main);
      border-top: 7px solid var(--quinary-light);
      border-radius: 50%;
      width: 65px;
      height: 65px;
      animation: spin .5s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
  <div id="loading-overlay">
    <div class="loader"></div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const loadingOverlay = document.getElementById('loading-overlay');

      // Show the loading overlay initially
      loadingOverlay.style.display = 'flex';

      // Delay hiding the loading overlay by 500 milliseconds (adjust as needed)
      setTimeout(function() {
        loadingOverlay.style.display = 'none';
      }, 5);
    });
  </script>
</div>
