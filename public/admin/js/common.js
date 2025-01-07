
// @author         : Fahad Jadiya 
// @function name  : createToast
// @params         : icon, title, message, duration
// @paramsType     : json 
// @description    : use to trigger any success or fail notification
function createToast({ icon, title, message, duration = 3000 }) {
    // Create the container if it doesn't exist
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
      toastContainer = document.createElement('div');
      toastContainer.id = 'toast-container';
      toastContainer.style.position = 'fixed';
      toastContainer.style.top = '10px';
      toastContainer.style.right = '10px';
      toastContainer.style.zIndex = '9999';
      toastContainer.style.display = 'flex';
      toastContainer.style.flexDirection = 'column';
      toastContainer.style.gap = '10px';
      document.body.appendChild(toastContainer);
    }
  
    // Create the toast element
    const toast = document.createElement('div');
    toast.style.display = 'flex';
    toast.style.alignItems = 'center';
    toast.style.justifyContent = 'space-between';
    toast.style.background = '#fff';
    toast.style.color = '#333';
    toast.style.boxShadow = '0 2px 6px rgba(0, 0, 0, 0.2)';
    toast.style.padding = '10px 15px';
    toast.style.borderRadius = '5px';
    toast.style.minWidth = '250px';
    toast.style.animation = 'fadeIn 0.3s ease';
    toast.style.position = 'relative';
  
    // Icon
    if (icon) {
      const iconElement = document.createElement(icon.startsWith('fa-') ? 'i' : 'img');
      if (icon.startsWith('fa-')) {
          iconElement.className = icon; // For FontAwesome icons
          iconElement.style.fontSize = '20px'; // Adjust size for FontAwesome
      } else {
          iconElement.src = icon; // For image icons
          iconElement.alt = 'Icon';
          iconElement.style.width = '20px';
          iconElement.style.height = '20px';
      }
      iconElement.style.marginRight = '10px';
      toast.appendChild(iconElement);
    }
  
    // Content container
    const content = document.createElement('div');
    content.style.flex = '1';
    content.style.marginLeft = icon ? '10px' : '0';
  
    // Title
    if (title) {
      const titleElement = document.createElement('strong');
      titleElement.textContent = title;
      titleElement.style.display = 'block';
      titleElement.style.fontSize = '14px';
      titleElement.style.marginBottom = '5px';
      content.appendChild(titleElement);
    }
  
    // Message
    if (message) {
      const messageElement = document.createElement('span');
      messageElement.textContent = message;
      messageElement.style.fontSize = '12px';
      content.appendChild(messageElement);
    }
  
    toast.appendChild(content);
  
    // Close button
    const closeButton = document.createElement('button');
    closeButton.textContent = '×';
    closeButton.style.background = 'transparent';
    closeButton.style.border = 'none';
    closeButton.style.color = '#999';
    closeButton.style.fontSize = '16px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.marginLeft = '10px';
    closeButton.onclick = () => {
      toast.remove();
    };
    toast.appendChild(closeButton);
  
    // Append toast to the container
    toastContainer.appendChild(toast);
  
    // Auto-remove the toast after the specified duration
    setTimeout(() => {
      toast.remove();
    }, duration);
  }
  
  
//   createToast({
//     icon: 'https://example.com/icon.png', // Replace with your icon URL
//     title: 'Success',
//     message: 'Your operation was completed successfully!',
//     duration:5000
//   });