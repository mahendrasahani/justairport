$(document).ready(function() {  
    
       $(document).on('click', '#refreshBtn', function ()
    {
        window.location.reload();
        console.log('reloading this window');
    });
  //  let intervalID;
    function startTimer(duration, display)
    {
        var timer = duration, minutes, seconds;
        intervalID = setInterval(function ()
        {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            display.textContent = minutes + ":" + seconds;
            if (--timer < 0)
            {
                timer = duration;
                window.location.reload();
            }
        }, 1000);
    };
    
    
    const newJobModal = document.getElementById('new_job');
    newJobModal.addEventListener('shown.bs.modal', function (e) {
        e.preventDefault(); 
        clearInterval(intervalID);
        
        // console.log('Modal is open, running script...'); 
//---------------------------------------------------------------------------
        $('#account_number').focus(); // default focus on account field  
//---------------------------------------------------------------------------
        // copy client name and phone in pagssenger name and phone 
        $(document).on("blur", "#contact_name", function(){
            let contact_name = $(this).val();
            $("#passenger_name").val(contact_name);
        })
        $(document).on("blur", "#telephone_number", function(){
            let telephone_number = $(this).val();
            $("#passenger_phone").val(telephone_number);
        })
        $(document).on("click", "#clear_new_job_form", function(){
            $("#new_job_form").find("input, select, textarea").val("");
            $('#history_table').hide();
            $('#close_modals').hide(); 
        })
//---------------------------------------------------------------------------
        // handling form with keybord
        const new_job_inputs = document.querySelectorAll('#new_job input, select');
        const skipInputIds = ['job_day', 'basic_fare', 'congestion_charge', 'night_charge', 
        'booster_seat_charge', 'total_price', 'net_price', 'car_full_name'];
        
            $("#car_category_name").change(function(){ 
       const selected_car = $("#car_category_name").val();
       if(selected_car == 'a'){
        skipInputIds.push('baby_seat_count');
        skipInputIds.push('child_age');
        $("#baby_seat_age_list_col").hide();
        $("#baby_seat_count_col").attr("style", "display: none !important;"); 
       }else{
        // skipInputIds.push('new_item');
        $("#baby_seat_age_list_col").show();
        $("#baby_seat_count_col").show();
        skipInputIds.splice(8, 2);
       }
    });

    function navigateFields(event) {
        const key = event.key;
        const currentIndex = Array.prototype.indexOf.call(new_job_inputs, event.target);

    function isSkippedField(index) {
        return skipInputIds.includes(new_job_inputs[index].id);
    }

    if (key === 'Enter') {
        event.preventDefault();
        let nextIndex = (currentIndex + 1) % new_job_inputs.length;
        // Skip inputs in the skipInputIds list
        while (isSkippedField(nextIndex)) {
            nextIndex = (nextIndex + 1) % new_job_inputs.length;
        }
        new_job_inputs[nextIndex].focus();
        new_job_inputs[nextIndex].select();
    } else if (key === 'ArrowUp') {
        event.preventDefault();
        let prevIndex = (currentIndex - 1 + new_job_inputs.length) % new_job_inputs.length;
        // Skip inputs in the skipInputIds list
        while (isSkippedField(prevIndex)) {
            prevIndex = (prevIndex - 1 + new_job_inputs.length) % new_job_inputs.length;
        }
        new_job_inputs[prevIndex].focus();
        new_job_inputs[prevIndex].select();
    } 
}

new_job_inputs.forEach(input => {
    input.addEventListener('keydown', navigateFields);
});

//---------------------------------------------------------------------------
        //job time masking...
        $(document).ready(function(){
            initTimeHHMM();
        }); 
        function initTimeHHMM(){
            $(".time-hhmm").attr( 'maxlength', '4');
            $(".time-hhmm").attr('placeholder', 'HH:MM');
            $(".time-hhmm").bind({
                keydown: CheckNum,
                blur: formateHHMM,
                focus: unformateHHMM
            });
        }	 
        function CheckNum(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        };
        function unformateHHMM(e) {
            $(this).val($(this).val().replace(':', ''));
            $(this).select();
        } 
        function formateHHMM(e) {
            var str  = $(this).val();
            if (str.length > 2){
                str = ('0'+ str).slice(-4);
            }
            else{
                str = ('0'+str + '00').slice(-4);    
            }
            var mm = parseInt(str.substr(2, 2));
            var hh = parseInt(str.slice(0,2));
            if (mm > 59){
                mm = mm-60;
            }
            if (hh > 23){
                hh = hh % 24;
            }
            mm = ('0' + mm).slice(-2);
            hh = ('0' + hh).slice(-2);
            var formate = hh + ':' + mm;
            $(this).val(formate);
        }
//---------------------------------------------------------------------------------------

    });
    newJobModal.addEventListener('hidden.bs.modal', function () {
        // console.log('Modal is closed, cleaning up...');
         let threeMinutes = 60 * 3;
        var display = document.querySelector('#time');
        startTimer(threeMinutes, display);
    });
     window.onload = function ()
    {
        var fiveMinutes = 60 * 3,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };

 
});
