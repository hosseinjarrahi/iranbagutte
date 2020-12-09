<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>

<script>
    (function(){
        let ajax = function (url) {
            let event = window.parent.e ? window.parent.e : false
            let xhr = new XMLHttpRequest();
            let formData = new FormData();
            formData.append('event', event);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    alert(JSON.parse(xhr.response).message)
                }
            };
            xhr.open('POST', url);
            xhr.send(event ? formData : false);
        };

        ajax('/get-gift-code')
    })();
</script>

</html>
