$(document).ready(function () {
    $('#terminal').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'Controller.php',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    document.getElementById('parent1').innerHTML = 'Пиццa: ' + jsonData.first;
                    document.getElementById('parent2').innerHTML = 'Соус: ' + jsonData.second;
                    document.getElementById('parent3').innerHTML = 'Размер: ' + jsonData.third;
                    document.getElementById('parent4').innerHTML = 'Стоимость: ' + jsonData.price + 'BYN';

                } else {
                    alert('Invalid Credentials!');
                }
            }
        });
    });
});