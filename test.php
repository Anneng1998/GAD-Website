<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="" id="region">
        <options></options>
    </select>
</body>
<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>
    <script>
        // attach handlers when user had selected an item in the dropdown   
        $('#region').on('change', function(){ // fill province dropdown });
        $('#province').on('change', function(){ // fill cities dropdown });
        $('#city').on('change', function(){ // fill barangay dropdown });
        
        // call the plugin to those dropdowns with the proper location_type
        $('#region').ph_locations({'location_type': 'regions'});
        $('#province').ph_locations({'location_type': 'provinces'});
        $('#city').ph_locations({'location_type': 'cities'});
        $('#barangay').ph_locations({'location_type': 'barangays'});
        
        // fill up the regions dropdown, so user can start "drilling down"
        $('#region').ph_locations('fetch_list');
    </script>
</html>