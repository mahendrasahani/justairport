$(document).ready(function() { 
    initTimeHHMM();
    $('#account_number').focus();
    $('#account_number').select();
    const edit_job_inputs = document.querySelectorAll('#edit_form_data input, select'); 
    const skipInputIds = ['job_day', 'basic_fare', 'congestion_charge', 'night_charge', 
    'booster_seat_charge', 'total_price', 'net_price', 'car_full_name',
    'created_by', 'assigned_by', 'allocated_by', 'last_editedb_by', 'driver_details', 'c_s',
    'd_status', 'd_share'];

    function navigateFields(event) {
        const key = event.key;
        const currentIndex = Array.prototype.indexOf.call(edit_job_inputs, event.target); 
        function isSkippedField(index) {
            return skipInputIds.includes(edit_job_inputs[index].id);
        }
   

            // if (key === 'Tab' || key === 'ArrowDown' || key === 'Enter'){ 
            // if (key === 'Tab' || key === 'Enter' || key === 'ArrowRight' ){
            if (key === 'Enter'){
                event.preventDefault();
                let nextIndex = (currentIndex + 1) % edit_job_inputs.length;
                while (isSkippedField(nextIndex)) {
                    nextIndex = (nextIndex + 1) % edit_job_inputs.length;
                }
                edit_job_inputs[nextIndex].focus();
                edit_job_inputs[nextIndex].select();
            } else if (key === 'ArrowUp'){
                event.preventDefault();
                let prevIndex = (currentIndex - 1 + edit_job_inputs.length) % edit_job_inputs.length;
                while (isSkippedField(prevIndex)) {
                    prevIndex = (prevIndex - 1) % edit_job_inputs.length;
                }
                edit_job_inputs[prevIndex].focus();
                edit_job_inputs[prevIndex].select();
            }
    }
    edit_job_inputs.forEach(input => {
        input.addEventListener('keydown', navigateFields);
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
    // ----------------------------------------------------------------------------------------
    // ----------------------------------------------------------------------------------------
    





});