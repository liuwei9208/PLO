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

  const cal = new Calendar(calendarEl, {
    locales: allLocales,
    locale: "ja",
    initialView: "dayGridMonth",
    plugins: [interactionPlugin, dayGridPlugin],
    contentHeight: "auto",
    fixedWeekCount: false,
    selectable: true,
    // FullCalendar (ja locale) renders day numbers like "1日". We want "1"..."31" only.
    dayCellContent: function (arg) {
      return { html: arg.dayNumberText.replace(/日$/, "") };
    },
    headerToolbar: {
      left: "prev",
      center: "title",
      right: "next",
    },
    dateClick: function (info) {
      console.log("Date clicked:", info.dateStr);
      // Handle date click if needed
      if (typeof diarys_date !== "undefined" && diarys_date.length > 0) {
        for (let i = 0; i < diarys_date.length; i++) {
          if (diarys_date[i].date == info.dateStr) {
            const date = info.dateStr;
            if (date != '') {
              window.location.href = `/groups/photodiary?date=${date}`;
            } else {
              window.location.href = `/groups/photodiary`;
            }
            return;
          }
        }
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
});
