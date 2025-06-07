$(document).on('submit','#ncategoryButton',function(e){
     e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    var name = $('#ncateg').val();
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form.serialize(),
        dataType: "JSON",
        success: function (response) {
            
             $('.category').append(response.data)
             $('#cnm').html(response.massage)
             $('#ncateg').val('');
        }
    });
});
$(document).on('submit','#ncategoryButton2',function(e){
     e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    var name = $('#ncateg').val();
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form.serialize(),
        dataType: "JSON",
        success: function (response) {
            
             $('#cnm2').html(response.massage)
             $('#ncateg2').val('');
        }
    });
});
$(document).on('submit','#ncolorButton',function(e){
     e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form.serialize(),
        dataType: "JSON",
        success: function (response) {
            
             $('#color').append(response.data)
             $('#cnm3').html(response.massage)
             $('#ncolor').val('');
        }
    });
});
$(document).on('submit','#nTagButton',function(e){
     e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form.serialize(),
        dataType: "JSON",
        success: function (response) {
            
             $('#tag').append(response.data)
             $('#cnm4').html(response.massage)
             $('#ntag').val('');
        }
    });
});
$(document).on('submit','#nSizeButton',function(e){
     e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form.serialize(),
        dataType: "JSON",
        success: function (response) {
            
             $('#size').append(response.data)
             $('#cnm5').html(response.massage)
             $('#nsize').val('');
        }
    });
});
$(document).on('submit','#nMiniButton',function(e){
     e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form.serialize(),
        dataType: "JSON",
        success: function (response) {
            
             $('#mini_category').append(response.data)
             $('#cnm6').html(response.massage)
             $('#miniCat').val('');
             
        }
    });
});

  $(document).on('change', '#mainCategory', function() {
                
                var options = document.getElementById('mainCategory').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/get/sub-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        let data = '<option value="">Select Sub Category</option>';
                        $.each(response, function (key, val) { 
                            data += '<option value="'+val.id+'">'+val.name+'</option>';
                            
                        });
                        $('#nsubc').html(data);
                    }
                });
            });

            $(document).on('change', '#nsubc', function() {
                
                var options = document.getElementById('nsubc').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/get/mini-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        let data = '<option value="">Select mini Category</option>';
                        $.each(response, function (key, val) { 
                            data += '<option value="'+val.id+'">'+val.name+'</option>';
                            
                        });
                        $('#mini').html(data);
                    }
                });
            });