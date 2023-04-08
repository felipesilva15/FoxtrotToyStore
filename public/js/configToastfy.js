// Constant variable toast
const toast = {};

// Enum for backgound colors
const toastType = {
    success: "success",
    error: "danger",
    info: "primary",
    warning: "warning",
}

// Show toast
toast.show = (type, message) => {
    Toastify({
        text: message,
        duration: 4000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        className: `bg-${type} bg-gradient`,
        escapeMarkup: true,
        onClick: function(){} // Callback after click
    }).showToast();
}

// Show success toast
toast.success = (message) => {
    toast.show(toastType.success, message);
}

// Show error toast
toast.error = (message) => {
    toast.show(toastType.error, message);
}

// Show info toast
toast.info = (message) => {
    toast.show(toastType.info, message);
}

// Show warning toast
toast.warning = (message) => {
    toast.show(toastType.warning, message);
}