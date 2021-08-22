getAgent = function(mle){
    url = http://10.0.2.2:8387/agent/
    $.ajax({
        url:   url+mle,
        type:       'POST',
        data: dataStatus,
        dataType:   'json',
        // async:      true,
        success: function(data, status) {
            console.log(data);
            if (data.length == 0) {

                alert('Matricule Inexistante !');

            } else {
                alert("c bien");
               //setForm(selectedAgent);

            }
            // {#window.location.href = "{{ path('order_index')|escape('js') }}";#}
        },
        error : function(xhr, textStatus, errorThrown) {
            alert('Ajax request failed.');
        }
    });
}