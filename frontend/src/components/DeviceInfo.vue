<template>
  <div>
    <h3 v-if="fetchingData">Loading...</h3>
    <table v-else-if="filteredDeviceData.length" class="styled-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Primary Hardware</th>
          <th>OS Version</th>
          <th>Vendor</th>
          <th>Model</th>
          <th>Browser Name</th>
          <th>Browser Version</th>
          <th>OS Name</th>
          <th>Rendering Engine</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in filteredDeviceData" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ item.primary_hardware_type }}</td>
          <td>{{ item.os_version }}</td>
          <td>{{ item.vendor }}</td>
          <td>{{ item.model }}</td>
          <td>{{ item.browser_name }}</td>
          <td>{{ item.browser_version }}</td>
          <td>{{ item.os_name }}</td>
          <td>{{ item.browser_rendering_engine }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  name: "TabInfo",
  data() {
    return {
      deviceInfo: null,
      fetchingData: false,
    };
  },
  async mounted() {
    await this.fetchData();
  },
  computed: {
    filteredDeviceData() {
      if (this.deviceInfo && this.deviceInfo.data) {
        return this.deviceInfo.data
          .slice()
          .sort((a, b) => {
            let aParts = a.os_version.split('.').map(Number);
            let bParts = b.os_version.split('.').map(Number);

            for (let i = 0; i < Math.max(aParts.length, bParts.length); i++) {
              let aVal = aParts[i] || 0;
              let bVal = bParts[i] || 0;
              if (aVal !== bVal) return bVal - aVal;
            }
            return 0;
          });
      }
      return [];
    },
  },
  methods: {
    async fetchData() {
      this.fetchingData = true;
      try {
        const response = await fetch("http://localhost:8080/v1/getSortedList");
        if (!response.ok) throw new Error("Network response was not ok");
        this.deviceInfo = await response.json();
      } catch (error) {
        console.error("Error fetching data:", error);
      } finally {
        this.fetchingData = false;
      }
    },
  },
};
</script>
