// Import FullCalendar modules
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import allLocales from "@fullcalendar/core/locales-all";

let calendar;

// Function to initialize a calendar
function initializeCalendar(calendarEl, calendarInstance) {
  if (!calendarEl) {
    return null;
  }

  // Get the selected date from the page (if any)
  const selectedDate = typeof date !== "undefined" && date !== '' ? date : null;
  // Get the selected month from the page (if any)
  const selectedMonth = typeof month !== "undefined" && month !== '' ? month + '-01' : null;
  // Use date if available, otherwise use month, otherwise use current date
  const initialDate = selectedDate || selectedMonth || undefined;
  
  const cal = new Calendar(calendarEl, {
    locales: allLocales,
    locale: "ja",
    initialView: "dayGridMonth",
    initialDate: initialDate,
    plugins: [interactionPlugin, dayGridPlugin],
    contentHeight: "auto",
    fixedWeekCount: false,
    selectable: true,
    // FullCalendar (ja locale) renders day numbers like "1日". We want "1"..."31" only.
    dayCellContent: function (arg) {
      return { html: arg.dayNumberText.replace(/日$/, "") };
    },
    // Add class to selected date cell
    dayCellClassNames: function (arg) {
      if (selectedDate && arg.dateStr === selectedDate) {
        return ['selected-date-cell'];
      }
      return [];
    },
    headerToolbar: {
      left: "prev",
      center: "title",
      right: "next",
    },
    dateClick: function (info) {
      console.log("Date clicked:", info.dateStr);
      // Handle date click - redirect to show diaries for the selected date
      // Clear month parameter when clicking a specific date
      const date = info.dateStr;
      if (date != '') {
        window.location.href = `/photodiary?date=${date}`;
      } else {
        window.location.href = `/photodiary`;
      }
    },
  });

  // Add events if diarys_date is available
  if (typeof diarys_date !== "undefined" && diarys_date.length > 0) {
    for (let i = 0; i < diarys_date.length; i++) {
      cal.addEvent({
        start: diarys_date[i].date,
        color: "#FFDA89",
        display: "background",
      });
    }
  }

  cal.render();
  return cal;
}

document.addEventListener("DOMContentLoaded", function () {
  // Initialize desktop calendar
  const calendarEl = document.getElementById("diary-calendar");
  if (calendarEl) {
    calendar = initializeCalendar(calendarEl, calendar);
  }
  
  // Initialize mobile calendar
  const mobileCalendarEl = document.getElementById("diary-calendar-mobile");
  if (mobileCalendarEl) {
    initializeCalendar(mobileCalendarEl, null);
  }
});
