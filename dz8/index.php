<?php
require_once("db.php");

$regions = $conn->query("SELECT * FROM regions");

$cities = [];
if (isset($_POST['region_id'])) {
    $region_id = intval($_POST['region_id']);
    $cities = $conn->query("SELECT * FROM cities WHERE region_id = $region_id");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Динамические выпадающие списки</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Выберите регион и город</h2>

<label for="regions">Регион:</label>
<select id="regions">
    <option value="0">-выберите регион-</option>
    <?php while ($row = $regions->fetch_assoc()): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php endwhile; ?>
</select>

<label for="cities" style="display:none;">Город:</label>
<select id="cities" style="display:none;">
    <option value="0">-выберите город-</option>
</select>

<script>
$(document).ready(function() {
    $('#regions').change(function() {
        var regionId = $(this).val();
        
        if (regionId != 0) {
            $.ajax({
                url: 'cities.php',
                type: 'POST',
                data: { region_id: regionId },
                dataType: 'json',
                success: function(data) {
                    $('#cities').empty().append('<option value="0">-выберите город-</option>');
                    $.each(data, function(index, city) {
                        $('#cities').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                    $('#cities').show();
                    $('label[for="cities"]').show();
                }
            });
        } else {
            $('#cities').hide();
            $('label[for="cities"]').hide();
        }
    });
});
</script>

</body>
</html>