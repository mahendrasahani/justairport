
$(document).ready(function() {
    $('#account_suggestion').select2();
    $('#account_name_suggestion').select2();
    $('#car_category').select2();
    const select2 = document.getElementsByClassName("select2-selection--single")
    select2[0].style.background = "#ff7fff";
    select2[1].style.background = "#ff7fff";
    console.log("seconds")
  });



function getDayName(date) {
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const dayIndex = date.getDay();
    return days[dayIndex];
}


function getDay(id1,id2){
    const dateBox=document.getElementById(`${id1}`);
  const dayBox=document.getElementById(`${id2}`);
  const selectedDate = new Date(dateBox.value);
    const dayName = getDayName(selectedDate);
    dayBox.value = dayName;
    $("#job_day_hidden").val(dayName);
  
}
// document.addEventListener('DOMContentLoaded', function() {
//     var accountSuggestion = document.getElementById('account_suggestion');
//     var inputFields = document.querySelectorAll('input');
//     accountSuggestion.addEventListener('input', function() {
//         var inputValue = accountSuggestion.value;
    
//         inputFields.forEach(function(inputField) {
//             inputField.disabled = !inputValue;
//         });
       
//     });

//     inputFields.forEach(function(inputField) {
//         inputField.addEventListener('input', function() {
//             if (accountSuggestion.value === '') {
//                 inputField.value = '';
//             }
//         });
//     });
// });

// document.addEventListener('DOMContentLoaded', function() {
//     var jobDateInput = document.getElementById('job_date');
//     var currentDate = new Date();
//     currentDate.setDate(currentDate.getDate() + 1);
//     var nextDay = currentDate.toISOString().slice(0, 10);
//     jobDateInput.value = nextDay; 
//     function getDayName(date) {
//         const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
//         const dayIndex = new Date(date).getDay();
//         return days[dayIndex];
//     }  
//     const dayName = getDayName(nextDay);
//     document.getElementById('job_day').value = `${dayName}`;
//     document.getElementById('job_day_hidden').value = `${dayName}`;
// });
 
  $('#account_suggestion').on('input', async function() {
    const accountNumber = $(this).val();
    const accountName = $("#account_name_suggestion");
    const displayName = $("#account_display_name");
    const accountId = $("#account_id");
    const contactName=$('#contact_name');
    const telephoneNumber=$('#telephone_number');
    const emailAddress = $("#email_address");
    let response = await fetch(get_account_with_acc_no_url + '?id=' + accountNumber);
    let responseData = await response.json();
    
    const data = responseData?.data;
    if(data){ 
      accountName.val(accountNumber);
      accountName.change();
      displayName.val(data?.get_account_status_type.status_name);
      accountId.val(data?.id);
      contactName.val(data?.contact_name)
      telephoneNumber.val(data?.contact_phone)
      emailAddress.val(data?.get_client.email)
    }
    $('#account_name_suggestion').select2('close');
  });

  $('#account_name_suggestion').on('input', async function(event) {
    event.preventDefault();
    const accountName = $(this).val();
    const accountNumber = $("#account_suggestion");
    const displayName = $("#account_display_name");
    const accountId = $("#account_id");
    const contactName=$('#contact_name');
    const telephoneNumber=$('#telephone_number');
    const emailAddress = $("#email_address")
    let response = await fetch(get_account_with_acc_no_url  + '/?id=' + accountName)
    let responseData = await response.json();
    const data = responseData?.data;  
    if (data){
      accountNumber.val(accountName);
      accountNumber.change()
      displayName.val(data?.get_account_status_type.status_name);
      accountId.val(data?.id);
      contactName.val(data?.contact_name)
      telephoneNumber.val(data?.contact_phone) 
    }
    $('#account_suggestion').select2('close');
  });

  $(document).ready(function() {
    let a = document.getElementById('account_suggestion');
    var firstSpan = a.nextElementSibling;
    firstSpan.id = 'firstSpan';

    let b = document.getElementById('account_name_suggestion');
    var firstSpan = b.nextElementSibling;
    firstSpan.id = 'secondSpan';

    $(document).on("click", "#firstSpan", function() {
      $('#account_name_suggestion').select2('open');
    })

    $(document).on("click", "#secondSpan", function() {
      $('#account_suggestion').select2('open');
    })

  });
  
  var mainData = null;
  $(document).ready(function() {
    $("#car_category").on("change", async () => {
      const option = document.getElementById("car_category");
      const categoryName = document.getElementById("car_category_name");
      const shortname = option.value;
      if (shortname != "") {
        let response = await fetch(get_car_category_url + '/?car_category_id=' + shortname)
        let responseData = await response.json();
        if (responseData?.data) {
          categoryName.value = responseData?.data?.name;
        }
      }else{
        categoryName.value = "";
      }
    })
  });

  $(document).ready(function(){
    const accSuggestion = $("#contact_suggestion");
    const telphoneNumber = $("#telephone_number");
    const contactName = $("#contact_name");
    const contactId = $("#client_id");
    const emailAddress = $("#email_address")
    let mainData = null;
    const setData = (selectedAccount) => {
      for (let i = 0; i < mainData?.length; i++) {
        if (selectedAccount == mainData[i]?.name) {
          telphoneNumber.val(mainData[i].phone);
          contactId.val(mainData[i].id)
          emailAddress.val(mainData[i].email) 
        }
      }
      contactName.val(selectedAccount);
      accSuggestion.hide();
    };
 
    $("#contact_name").on("keyup", async function(event) {
      const telphoneNumber = document.getElementById("telephone_number");
      const contactName = document.getElementById("contact_name");
      let response = await fetch(get_client_url + '?name=' + contactName.value)
      let responseData = await response.json(); 
      const data = responseData?.data;
      const suggestionBox = document.getElementById("contact_suggestion");
      suggestionBox.innerHTML = '';
      if (data?.length > 0 && data !== "") {
        mainData = data;
        suggestionBox.style.display = "block";
        for (let i = 0; i < data.length; i++) {
          const li = document.createElement('li');
          li.innerHTML = `${data[i].name}`;
          suggestionBox.append(li);
        }
      }else{
        telphoneNumber.val("");
      }
      if (event.key === 'Tab' || event.keyCode == 9){
        accSuggestion.hide();
      }
    }); 
    accSuggestion.on("click", "li", function() {
      const selectedAccount = $(this).text();
      setData(selectedAccount);
    }); 
    $(document.body).on("click", function(event){
      if (!$(event.target).closest(accSuggestion).length && !$(event.target).is(accSuggestion)) {
        accSuggestion.hide();
      }
    });
  });
 
  $(document).ready(function() {
    var journey_start = $("#journey_start");
    var journey_end = $("#journey_end");
    const journey_start_details = $("#journey_start_details"); 
    $("#journey_start").on("keyup", async () => {
      if (journey_start.val() == "P" || journey_start.val() == "p"){
        journey_start.val("P/UP");
        journey_end.val("DROP");
        $("#journey_type_id").val(1);
        setTimeout(function() {
          journey_start_details.focus();
        }, 100); 
      } else if (journey_start.val() == "D" || journey_start.val() == "d"){
        journey_start.val("DROP");
        journey_end.val("P/UP");
        $("#journey_type_id").val(2);
      }
      journey_start.select();
    });
  });

  $(document).ready(function() { 
    $('#account_suggestion').next('.select2-container').find('.select2-selection').focus();
  }); 

  document.getElementById("journey_start_details").addEventListener("change",()=>{
    const journey_start_details=document.getElementById("journey_start_details");
    const summary=document.getElementById("summary"); 
     if(journey_start_details.value==1){
        summary.value+="LHR";
       } 
       else if(journey_start_details.value==2){
        summary.value+="LGW";
       } 
       else if(journey_start_details.value==3){
        summary.value+="LTN";
       }
       else if(journey_start_details.value==4){
        summary.value+="STN";
       }
       else if(journey_start_details.value==5){
        summary.value+="LCY";
       }
       else if(journey_start_details.value==6){
        summary.value+="SEN";
       } 
  })

  function updateSummary() {
    // Get values from input fields and select boxes
    var notes = $('#notes').val();
    var terminal = $('#terminal').val();
    var flight_no = $('#flight_no').val();
    var city_of_arrival = $('#city_of_arrival').val();
    var car_park = $('#car_park').val();
    var additional_seat = $('#additional_seat').val();
    // var comment = $('#comment').val(); 
   
    
    var notes_val = notes!=''?'NOTES: '+notes+', ':'';
    var terminal_val = terminal!=''?terminal+', ':'';
    var flight_no_val = flight_no!=''?flight_no+', ':'';
    var city_of_arrival_val = city_of_arrival!=''?city_of_arrival+', ':'';
    var car_park_val = car_park!=''?'CAR PARK: '+car_park+', ':'';
    var additional_seat_val = additional_seat!=''?additional_seat+', ':'';
    // var comment_val = comment!=''?comment:'';

    var summaryText = `${notes_val}${terminal_val}${flight_no_val}${city_of_arrival_val}${car_park_val}${additional_seat_val}`;
    $('#comment').val(summaryText);
}

$('#flight_no, #city_of_arrival').on('input', updateSummary);
$('#notes, #car_park, #additional_seat').on('change', updateSummary); 
$(document).on('change', "#terminal", function(){
  let terminal_id = $('#terminal option:selected').data('id');
  $('#terminal_hidden').val(terminal_id);
  updateSummary();
});

var ul = document.getElementById('list');
var liSelected;
var index = 0;




document.addEventListener('keydown', function(event) {
  var len = ul.getElementsByTagName('td').length - 1;
  if (event.which === 40) { 
    index++;
    if (liSelected) {
      removeClass(liSelected, 'highlighted'); 
      next = ul.getElementsByTagName('td')[index];
      if (typeof next !== 'undefined' && index <= len) {
        liSelected = next;
      } else {
        index = 0;
        liSelected = ul.getElementsByTagName('td')[0];
      }
      addClass(liSelected, 'highlighted');
      console.log(index);
    } else {
      index = 0;
      liSelected = ul.getElementsByTagName('td')[0];
      addClass(liSelected, 'highlighted');
    }
  } else if (event.which === 38) { 
    if (liSelected) {
      removeClass(liSelected, 'highlighted');
      index--;
      console.log(index);
      next = ul.getElementsByTagName('td')[index];
      if (typeof next !== 'undefined' && index >= 0) {
        liSelected = next;
      } else {
        index = len;
        liSelected = ul.getElementsByTagName('td')[len];
      }
      addClass(liSelected, 'highlighted');
    } else {
      index = 0;
      liSelected = ul.getElementsByTagName('td')[len];
      addClass(liSelected, 'highlighted'); 
    }
  }
}, false);

 

function removeClass(el, className) {
  if (el.classList) {
    el.classList.remove(className);
  } else {
    el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
  }
}

function addClass(el, className) {
  if (el.classList) {
    el.classList.add(className);
  } else {
    el.className += ' ' + className;
  }
}


$(document).on('change', "#journey_start_details", async function(){
  let airport_id = $(this).val();  
  let append_html = '<option value="">Select Terminal</option>';
  let response = await fetch(get_terminal_list_url+"/?airport_id="+airport_id);
  let responseData = await response.json(); 
  responseData.data.forEach(function(item){
      append_html += `<option value="${item.pickup_point}" data-id="${item.id}">${item.pickup_point}</option>`;
  });
  $("#terminal").html(append_html);
})




document.addEventListener("DOMContentLoaded", function() {
  var selectedRowIndex = -1;

  function updateSelectedRow(newRowIndex) {
    if (selectedRowIndex !== -1) {
      $('#history_table tbody tr').eq(selectedRowIndex).find('td').removeClass('selected_history');
    }
    selectedRowIndex = newRowIndex;
    $('#history_table tbody tr').eq(selectedRowIndex).find('td').addClass('selected_history');
  }

  function handleArrowNavigation(direction) {
    var numRows = $('#history_table tbody tr').length;
    var newRowIndex;
  
    if (direction === 'up') {
      newRowIndex = selectedRowIndex > 0 ? selectedRowIndex - 1 : numRows - 1;
    } else if (direction === 'down') {
      newRowIndex = selectedRowIndex < numRows - 1 ? selectedRowIndex + 1 : 0;
    }
  
    updateSelectedRow(newRowIndex);
  }

  document.addEventListener("click", (event) => {
    const clickedRow = event.target.closest("#history_table tbody tr");
    
    if (clickedRow) {
      const previousSelected = document.querySelector("#history_table tbody tr.selected_history");
      if (previousSelected) {
        previousSelected.classList.remove("selected_history");
      }
      
      clickedRow.classList.add("selected_history");
      const rowIndex = Array.prototype.indexOf.call(clickedRow.parentNode.children, clickedRow);
      updateSelectedRow(rowIndex);
    }
  });

  $(document).keydown(function(e) {
    const passengerCount = document.getElementById("passenger_count");
    const checkin_luggage_count = document.getElementById("checkin_luggage_count");
    const hand_luggage_count = document.getElementById("hand_luggage_count");
    const flatpicker_time = document.getElementById("job_time");


    if (document.activeElement === passengerCount || document.activeElement === checkin_luggage_count || document.activeElement === hand_luggage_count || document.activeElement === flatpicker_time) {
      return;
    }

    if (e.key === 'ArrowUp' || e.keyCode === 38) {
      handleArrowNavigation('up');
    } else if (e.key === 'ArrowDown' || e.keyCode === 40) {
      handleArrowNavigation('down');
    } else if (e.key === 'Enter') {
      var selectedRowData = $('#history_table tbody tr').eq(selectedRowIndex).children().map(function() {
        return $(this).text();
      }).get();
      const tableRows = Array.from(document.querySelectorAll('#history_table tr'));
      console.log("clicked")
      let trId = 0;
      for (let i = 0; i < tableRows.length; i++) {
        const tds = tableRows[i].querySelectorAll('td');
        for (let j = 0; j < tds.length; j++) {  
          if (selectedRowData[0] === tds[j].innerHTML) {
            trId = tableRows[i].id;
            break;
          }
        }  
      }
      const trElement = document.getElementById(trId);
      if (trElement) {
        trElement.click();
      }
    }
  });

  updateSelectedRow(selectedRowIndex);
});


 

 
