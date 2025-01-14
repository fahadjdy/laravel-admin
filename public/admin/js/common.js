// *********** FUNCTION AND IT'S USAGE ***************** 
// 1. createToast : use for notification
// 1.togglePasswordVisibility
// 2. js-text-field (class)  : allow only alphabetic 
// 3. js-email-field          : allow only email 
// 4. js-number-field          : allow only digit (0-9) 

// **************************** 

var failBgColor = '#ffd6d6';
var succesBgColor = '#d7ffcf';
var warningBgColor = '#ffe7ab';


// @author         : Fahad Jadiya 
// @function name  : createToast
// @params         : icon, title, message, duration
// @paramsType     : json 
// @description    : use to trigger any success or fail notification
function createToast({ status,icon, title, message, duration = 3000 }) {
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

    if(status == 'success'){
      toast.style.background = succesBgColor;
    }else if(status == 'fail'){
      toast.style.background = failBgColor;
    }else{
      toast.style.background = warningBgColor;
    }

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
          iconElement.className = 'fa ' + icon; // For FontAwesome icons
          iconElement.style.fontSize = '20px'; // Adjust size for FontAwesome
      } else {
          iconElement.src = icon; // For image icons
          iconElement.alt = 'Icon';
          iconElement.style.width = '20px';
          iconElement.style.height = '20px';
      }
      iconElement.style.marginRight = '10px';
      iconElement.style.color = 'red';
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
  


/**
 * @author : Fahadjdy
 * @description : this function is used to validate input fields by allowing only alphabetic characters.
 * @use : just add "js-text-field" class at input field
 */
document.querySelectorAll('.js-text-field').forEach(function(input) {
  input.addEventListener('input', function() {
      const invalidInput = this.value.match(/[^a-zA-Z]/g);
      
      if (invalidInput) {
          this.value = this.value.replace(/[^a-zA-Z]/g, '');
          createToast({
              status: 'fail',
              icon: 'fa-ban', // FontAwesome warning icon
              title: 'Not Allowed',
              message: 'Only alphabetic characters are allowed!',
              duration: 5000
          });
      }
  });
});


/**
* @author : Fahadjdy
* @description : this function is used to validate input fields by allowing only valid email.
* @use : just add "js-text-field" class at input field
*/
document.querySelectorAll('.js-email-field').forEach(function(input) {
  input.addEventListener('input', function() {
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailPattern.test(this.value)) {
          this.value = '';
          createToast({
              status: 'fail',
              icon: 'fa-ban', // FontAwesome warning icon
              title: 'Not Allowed',
              message: 'Only allowing valid email!',
              duration: 5000
          });
      }
  });
});

/**
* @author : Fahadjdy
* @description : This function validates input fields by allowing only numeric characters (0-9).
* @use : just add "js-text-field" class at input field
*/
document.querySelectorAll('.js-number-field').forEach(function(input) {
  input.addEventListener('input', function() {
      const invalidInput = this.value.match(/[^0-9]/g);
      if (invalidInput) {
          this.value = this.value.replace(/[^0-9]/g, '');
          createToast({
              status: 'fail',
              icon: 'fa-ban', // FontAwesome warning icon
              title: 'Not Allowed',
              message: 'Only allowing numeric characters!',
              duration: 5000
          });
      }
  });
});
