function waybillComponent() {
    return {
        waybills: [],
        paginationLinks: [],
        currentPage: 1,
        totalPages: 1,

        fetchWaybills(page = 1) {
            fetch(`/waybills/fetch?page=${page}`)
                .then(response => response.json())
                .then(data => {
                    console.log("API Response:", data); // Debugging log
                    this.waybills = data.data;
                    this.currentPage = data.current_page;
                    this.totalPages = data.last_page;

                    // ✅ Assign pagination links properly
                    this.paginationLinks = data.links ?? [];
                    
                    console.log("API Response:", data); // ✅ Confirm API data
                    this.paginationLinks = data.links; // ✅ Ensure Alpine gets this
                    console.log("Pagination Links after assignment:", this.paginationLinks);

                    console.log("Pagination Links:", this.paginationLinks); // Debugging log
                })
                .catch(error => console.error("Error fetching waybills:", error));
        }
    };
}
export default waybillComponent;
