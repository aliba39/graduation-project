<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Approval/Rejection</title>
</head>
<body>

<div>
    <h2>Email Approval/Rejection</h2>
    <button id="approveBtn">Approve</button>
    <button id="rejectBtn">Reject</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#approveBtn').click(function(){
            sendEmail('approval');
        });

        $('#rejectBtn').click(function(){
            sendEmail('rejection');
        });

        function sendEmail(type) {
            var token = '{{ csrf_token() }}'; // Get CSRF token from Blade template
            $.ajax({
                url: '{{ route("send.email") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token // Set CSRF token as header
                },
                data: {
                    type: type,
                },
                success: function(response){
                    alert(response.message);
                }
            });
        }
    });
</script>


</body>
</html>
