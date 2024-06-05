document.addEventListener('DOMContentLoaded', function () {
    function checkNotifications() {
        fetch('/notifications/check')
            .then(response => response.json())
            .then(data => {
                const notificationIcon = document.querySelector('.notification-icon');
                if (data.has_new_notification) {
                    notificationIcon.classList.add('new-notification');
                } else {
                    notificationIcon.classList.remove('new-notification');
                }
            })
            .catch(error => console.error('Error:', error));
    }

    checkNotifications();

    // استدعاء checkNotifications بعد عمليات الحذف أو التحديد كمقروءة
    document.querySelectorAll('.mark-as-read, .delete-notification').forEach(button => {
        button.addEventListener('click', function () {
            setTimeout(checkNotifications, 500); // تأخير بسيط لضمان اكتمال العملية
        });
    });
});

/* document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
        }
    })
    .then(response => {
        if (response.ok) {
            document.getElementById('confirmationMessage').style.display = 'block';

            form.reset();
        } else {
            console.error('حدث خطأ أثناء الإرسال');
        }
    })
    .catch(error => {
        console.error('خطأ:', error);
    });
}); */
