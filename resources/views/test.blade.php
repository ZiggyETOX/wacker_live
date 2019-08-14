@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="post" accept-charset="UTF-8" novalidate="" action="https://www.pages09.net/rogerwilcodigitalptyltd/cwpreferences/IBM/Subscribe/Subscribe" class="fsForm fsMultiColumn" id="fsForm3009895">
    <div class="fsPage" id="fsPage3009895-1">
        <div id="ReactContainer3009895" style="display:none" class="FsReactContainerInitApp" data-fs-react-app-id="3009895"></div>
        <div class="fsSection fs2Col">
            <div id="fsRow3009895-1" class="fsRow fsFieldRow">
                <div class="fsRowBody fsCell fsFieldCell fsFirst fsLabelVertical fsSpan50" id="fsCell62528834" lang="en" fs-field-type="text" fs-field-validation-name="First Name">
                    <label id="label62528834" class="fsLabel fsRequiredLabel" for="First_Name">First Name<span class="fsRequiredMarker">*</span> </label>
                    <input type="text" id="First_Name" name="First_Name" size="50" required="" value="" class="fsField fsFormatText fsRequired   " aria-required="true">
                </div>
                <div class="fsRowBody fsCell fsFieldCell fsLast fsLabelVertical fsSpan50" id="fsCell62528859" lang="en" fs-field-type="text" fs-field-validation-name="Last Name">
                    <label id="label62528859" class="fsLabel fsRequiredLabel" for="Last_Name">Last Name<span class="fsRequiredMarker">*</span> </label>
                    <input type="text" id="Last_Name" name="Last_Name" size="50" required="" value="" class="fsField fsFormatText fsRequired   " aria-required="true">
                </div>
                <div class="fs-clear"></div>
            </div>
            <div id="fsRow3009895-2" class="fsRow fsFieldRow">
                <div class="fsRowBody fsCell fsFieldCell fsFirst fsLabelVertical fsSpan50" id="fsCell62528267" lang="en" fs-field-type="email" fs-field-validation-name="Email">
                    <label id="label62528267" class="fsLabel fsRequiredLabel" for="email">Email<span class="fsRequiredMarker">*</span> </label>
                    <input type="email" id="email" name="email" size="50" required="" value="" class="fsField fsFormatEmail fsRequired" aria-required="true">
                </div>
                <div class="fsRowBody fsCell fsFieldCell fsLast fsLabelVertical fsSpan50" id="fsCell62528276" lang="en" fs-field-type="phone" fs-field-validation-name="Phone">
                    <label id="label62528276" class="fsLabel fsRequiredLabel" for="mobile">Phone<span class="fsRequiredMarker">*</span> </label>
                    <input type="tel" id="mobile" name="mobile" size="20" required="" value="" class="fsField fsFormatPhoneZA  fsRequired" aria-required="true" data-country="ZA" data-format="national">
                </div>
                <div class="fs-clear"></div>
            </div>
            <div id="fsRow3009895-3" class="fsRow fsFieldRow">
                <div class="fsRowBody fsCell fsFieldCell fsFirst fsLabelVertical fsSpan50" id="fsCell62528473" lang="en" fs-field-type="datetime" fs-field-validation-name="Date of birth">
                    <fieldset role="group" aria-labelledby="fsLegend62528473" id="label62528473">
                        <legend id="fsLegend62528473" class="fsLabel fsRequiredLabel fsLabelVertical"><span>Date of birth<span class="fsRequiredMarker">*</span></span></legend>
                        <div class="fieldset-content">
                            <!-- Used to pull in url for jquery -->
                            <!-- <span aria-hidden="true" style="display:none;" id="fsCalendar62528473ImageUrl">https://canalwalk.formstack.com/forms/images/2/calendar.png</span> -->
                            <!-- <input data-skip-validation="" data-date-format="d F Y" type="hidden" id="field62528473Format" name="field62528473Format" value="DMY" required="">
                            
                            
                            <input data-skip-validation="" type="text" id="fsCalendar62528473Link" class="fsCalendarPickerLink hasDatepicker" style="display:none;" aria-hidden="true" required=""><img class="ui-datepicker-trigger" src="https://canalwalk.formstack.com/forms/images/2/calendar.png" alt="Select Date" title="Select Date" aria-hidden="true"> -->
                            <input type="hidden" name="DOB" id="DOB" label="Date of Birth *" value="" required="">
                            <input type="date" placeholder="dd/mm/yyyy" name="popudate" id="popudate" onchange="populateDate();" required="" label="Date of Birth *">
                            <script type="text/javascript">
                                function populateDate() {
                                    var dateField = document.getElementById('popudate').value,
                                        split = dateField.split('-');
                                    document.getElementById('DOB').value = split[1] + '/' + split[2] + '/' + split[0];
                                }
                            </script>
                            <div id="fsCalendar62528473" class="fsCalendar" style=" position:absolute"></div>
                        </div>
                    </fieldset>
                </div>
                <div class="fsRowBody fsCell fsFieldCell fsLast fsLabelVertical fsSpan50" id="fsCell62528435" lang="en" fs-field-type="radio" fs-field-validation-name="Gender">
                    <fieldset role="group" aria-labelledby="fsLegend62528435" id="label62528435">
                        <legend id="fsLegend62528435" class="fsLabel fsRequiredLabel fsLabelVertical"><span>Gender<span class="fsRequiredMarker">*</span></span></legend>
                        <div class="fieldset-content">
                            <select name="gender" id="gender" label="Gender *" style="background: #ffffff;" required="">
                                <option value="Unknown" disabled="" selected="">Unknown</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div id="fsSubmit3009895" class="fsSubmit fsPagination">
                    <button type="button" id="fsPreviousButton3009895" class="fsPreviousButton" value="Previous Page" style="display:none;" aria-label="Previous"><span class="fsFull">Previous</span><span class="fsSlim">←</span></button>
                    <button type="button" id="fsNextButton3009895" class="fsNextButton" value="Next Page" style="display:none;" aria-label="Next"><span class="fsFull">Next</span><span class="fsSlim">→</span></button>
                    <input id="fsSubmitButton3009895" class="fsSubmitButton" style="" type="submit" value="Sign up" required="">
                    
                    
                    
                  <div class="clear"></div>
                  <div class="">
                      </div>
                </div>
            </div>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
