// Add dark mode support
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Listen for dark mode changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
    if (!('theme' in localStorage)) {
        if (event.matches) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
});
