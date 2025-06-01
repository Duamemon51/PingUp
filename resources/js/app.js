import './bootstrap';
document.addEventListener("DOMContentLoaded", function () {
    axios.get('/unread-messages').then(response => {
        response.data.forEach(msg => {
            console.log("Unread: ", msg);
        });
    });
});
