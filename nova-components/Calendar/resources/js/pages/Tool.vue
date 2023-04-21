<template>
  <div>
    <div ref="calendar"></div>
  </div>
</template>

<script>
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";

export default {
  data() {
    return {
      events: [],
    };
  },
  mounted() {
    const calendarEl = this.$refs.calendar;
    const calendar = new Calendar(calendarEl, {
      plugins: [dayGridPlugin],
      events: this.events,
    });
    calendar.render();
  },
  watch: {
    async events() {
      const calendarEl = this.$refs.calendar;
      const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        events: this.events,
      });
      calendar.render();
    },
  },
  async created() {
    try {
      const response = await fetch("/nova-vendor/calendar/calendario");
      const events = await response.json();
      this.events = events.map((event) => ({
        title: event.title,
        start: event.start,
      }));
    } catch (error) {
      console.error(error);
    }
  },
};
</script>
