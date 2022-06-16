function ClearVal ($array) {
  $.each($array, function(key, value){
    $(value).val('');
  });
}

function GetMonthName(monthNumber) {
  var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  if(monthNumber === ''){
    return '';
  }else{
    return months[monthNumber - 1];
  }
}