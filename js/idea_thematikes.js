acf.add_filter('select2_ajax_data', function( data, args, $input, field, instance ){
    if(data.field_key == "field_5ffd848b44d64"){
        data.competition_id = acf.getField('field_5f032fa04bae9').val() //this is the selected competition from the acf group
    }
    return data;
});