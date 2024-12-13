<section class="topheader">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset('uploads/sitesetting/' . $sitesetting->main_logo) }}" alt="" class="logo_img">
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-center">
                        <p class="top_header text-center">
                            {{ __('Bagamati Province Government') }} <br>
                            <span class="ministry_name">{{ __('Ministry of Culture, Tourism & Co-operatives') }}</span><br>
                            {{ __('Tourism Development Project') }}<br>
                            <span class="office_name">{{ __('Unit Office Kathmandu') }}</span><br>
                            {{ __('New Baneshwar, Nepal') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 top_right">
                <p class="date_time">
                    <span id="DATE_IN_NEPALI" class="inline-date-time"></span>
                    <span id="TIME" class="inline-date-time"></span>
                </p>
                <div class="container">
                    <img src="{{ asset('uploads/sitesetting/' . $sitesetting->flag_logo) }}" alt="" class="logo_img">
                    <div class="language-switcher">
                        @foreach (config('app.languages') as $langLocale => $langName)
                            <a href="{{ url()->current() }}?change_language={{ $langLocale }}" class="btn_en {{ app()->getLocale() === $langLocale ? 'active' : '' }}">
                                {{ strtoupper($langLocale) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  Nepali Date Picker library -->
<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.4.min.js" type="text/javascript"></script>

<script>
    function updateDateTime() {
        const dateElement = document.getElementById('DATE_IN_NEPALI');
        const timeElement = document.getElementById('TIME');

        const now = new Date();

        // Nepali months and days in Nepali
        const nepaliMonths = ["बैशाख", "जेठ", "असार", "साउन", "भदौ", "असोज", "कार्तिक", "मङ्सिर", "पुष", "माघ", "फाल्गुन", "चैत्र"];
        const nepaliDays = ["आइतबार", "सोमबार", "मङ्गलबार", "बुधबार", "बिहिबार", "शुक्रबार", "शनिबार"];

        // Convert to Nepali Date
        const nepaliDateObject = NepaliFunctions.AD2BS({ year: now.getFullYear(), month: now.getMonth() + 1, day: now.getDate() });
        const nepaliYear = nepaliDateObject.year.toString();
        const nepaliMonth = nepaliMonths[nepaliDateObject.month - 1];
        const nepaliDay = nepaliDateObject.day.toString();
        const nepaliWeekday = nepaliDays[now.getDay()];

        // Convert English numbers to Nepali numbers
        function convertToNepaliNumber(num) {
            const englishToNepaliNumbers = {
                '0': '०', '1': '१', '2': '२', '3': '३', '4': '४',
                '5': '५', '6': '६', '7': '७', '8': '८', '9': '९'
            };
            return num.split('').map(digit => englishToNepaliNumbers[digit] || digit).join('');
        }

        const nepaliFormattedYear = convertToNepaliNumber(nepaliYear);
        const nepaliFormattedDay = convertToNepaliNumber(nepaliDay);

        // Format time in Nepali
        const formattedTime = now.toLocaleTimeString('ne-NP', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false });
        const nepaliFormattedTime = convertToNepaliNumber(formattedTime);

        // Display in Nepali
        const nepaliFormattedDate = `${nepaliFormattedYear} ${nepaliMonth} ${nepaliFormattedDay}, ${nepaliWeekday}`;
        
        // Display in the elements
        dateElement.textContent = nepaliFormattedDate;
        timeElement.textContent = nepaliFormattedTime;
    }

    // Update the date and time every second
    setInterval(updateDateTime, 1000);

    // Call updateDateTime on page load
    window.onload = updateDateTime;
</script>
