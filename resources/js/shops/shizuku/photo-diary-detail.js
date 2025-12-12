// Import FullCalendar modules
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import allLocales from "@fullcalendar/core/locales-all";

let calendar;
let mobileCalendar;

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
    selectable: true,
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
            const shopSlug =
              typeof shop_slug !== "undefined" ? shop_slug : "shizuku";
            const castId =
              typeof cast_id !== "undefined" && cast_id ? cast_id : "";
            if (castId) {
              window.location.href = `/${shopSlug}/diarylist?cast_id=${castId}&date=${info.dateStr}`;
            } else {
              window.location.href = `/${shopSlug}/diarylist?date=${info.dateStr}`;
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
  const calendarEl = document.getElementById(
    "photo-diary-details-section-content-left-calendar"
  );
  const mobileEl = document.getElementById("diary-details-calendar-mobile");
  if (calendarEl) {
    calendar = initializeCalendar(calendarEl, calendar);
  }
  if (mobileEl) {
    mobileCalendar = initializeCalendar(mobileEl, mobileCalendar);
  }
});
