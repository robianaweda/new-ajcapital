Vue.config.devtools = true;

Vue.component("transactions", {
  props: ["t"],
  template: `<li class="transactions">
  <p>
      <h5 class="text-green" style="margin-bottom:-20px;padding-bottom:0">
          {{ t.name }}</h5><br />{{ t.time }}</p>
  <p class="d-sm-block d-md-none">
      <span class="text-green">Status:</span>
      {{ t.status}}<br />
      <span class="text-green">Value:</span>
      {{ t.value }}<br/>
      <span class="text-green">Client:</span>
      {{ t.client }}<br />
      <span class="text-green">
          Country:</span>
      {{ t.country }}<br/>
      <span class="text-green">Service:</span>
      {{ t.service}}
  </p>
  <p class="d-none d-md-block">
        <span class="text-green">Status:</span>
        {{ t.status}}
        |
        <span class="text-green">Value:</span>
        {{ t.value }}<br/>
        <span class="text-green">Client:</span>
        {{ t.client }}
        |
        <span class="text-green">
            Country:</span>
        {{ t.country }}<br/>
        <span class="text-green">Service:</span>
        {{ t.service}}
  </p>
  <hr class="event" style="margin-bottom:0px;"/>
  </li>`
});

var trans = new Vue({
  el: "#trans",
  data: {
    transactions: [
      {
        id: 1,
        service: "Corporate Initiative Management and Support",
        name: "Portfolio Monitoring Telecommunication Company",
        country: "Indonesia",
        time: "March 2019",
        status: "Ongoing",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: 2,
        service: "Creditor Support & Advisory",
        name: "Bondholder Restructuring of Distressed  Singapore OSV Company",
        country: "Singapore",
        time: "March 2019",
        status: "Ongoing",
        client: "Miclyn Express Offshore Limited",
        value: "USD 450 million"
      },
      {
        id: 3,
        service: "M&A Advisory and Fund Raising",
        name:
          "Financial Modelling and Working Capital Analysis of Infrastructure Company ",
        country: "Singapore",
        time: "March 2019",
        status: "Ongoing",
        client: "Confidential",
        value: "USD 3 billion"
      },
      {
        id: 4,
        service: "Corporate Initiative Management and Support",
        name: "Business Plan Development Industrial Estate",
        country: "Indonesia",
        time: "February 2019",
        status: "Ongoing",
        client: "Confidential",
        value: "USD 1 billion"
      },
      {
        id: 5,
        service: "M&A Advisory and Fund Raising",
        name: "Start-Up PMO & Fundraising ",
        country: "Indonesia",
        time: "March 2019",
        status: "Ongoing",
        client: "GoHalalGo",
        value: "N/A"
      },
      {
        id: 6,
        service: "Corporate Initiative Management and Support",
        name:
          "Advising Global Business on Integrated Financial Reporting in Preparation for Capital Raising",
        country: "Singapore",
        time: "October 2018",
        status: "Closed",
        client: "Confidential",
        value: "USD 80 million"
      },
      {
        id: "7",
        service: "Debt Restructuring & Turnaround Management",
        name: "Voluntary Restructuring Coal Company",
        country: "Indonesia",
        time: "September 2018",
        status: "Closed (December 2018)",
        client: "Confidential",
        value: "USD 60 million"
      },
      {
        id: "8",
        service: "Debt Restructuring & Turnaround Management",
        name: "Voluntary Restructuring LPG Company ",
        country: "Indonesia",
        time: "August 2018",
        status: "Ongoing",
        client: "Confidential",
        value: "USD 40 million"
      },
      {
        id: "9",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Multi Finance Company",
        country: "Indonesia",
        time: "August 2018",
        status: "Closed (October 2018)",
        client: "PT Sunprima Nusantara Pembiayaan",
        value: "IDR 4.1 trillion"
      },
      {
        id: "10",
        service: "Debt Restructuring & Turnaround Management",
        name: "Voluntary Restructuring Smart-Card Company ",
        country: "Indonesia",
        time: "July 2018",
        status: "Ongoing",
        client: "Confidential",
        value: "IDR 840 billion"
      },
      {
        id: "11",
        service: "Debt Restructuring & Turnaround Management",
        name: "Voluntary Restructuring Oil & Gas Drilling Company",
        country: "Indonesia",
        time: "July 2018",
        status: "Ongoing",
        client: "PT Apexindo Pratama Duta Tbk",
        value: "USD 319.7 million"
      },
      {
        id: "12",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Plastic Bottle Manufacturer Company II",
        country: "Indonesia",
        time: "June 2018",
        status: "Closed (July 2018)",
        client: "PT Namasindo Plas Abadi & Affiliations",
        value: "IDR 1.7 trillion"
      },
      {
        id: "13",
        service: "Creditor Support & Advisory",
        name:
          "Bondholder Restructuring Advisory to a Distressed Shipping Company",
        country: "Singapore",
        time: "June 2018",
        status: "Closed (November 2018)",
        client: "Confidential",
        value: "SGD 100 million"
      },
      {
        id: "14",
        service: "Liquidation Receivership and Court Appointments",
        name:
          "Creditors Voluntary Winding Up of a UK Insurance Company (held via Singapore)",
        country: "Singapore",
        time: "May 2018",
        status: "Closed (January 2019)",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "15",
        service: "Liquidation Receivership and Court Appointments",
        name:
          "United States Bankruptcy Trustee (Chapter 7) Asian Representative and Liquidation Agent",
        country: "Singapore",
        time: "February 2018",
        status: "Ongoing",
        client: "Zetta Jet Pte Ltd",
        value: "N/A"
      },
      {
        id: "16",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Plastic Bottle Manufacturer Company I",
        country: "Indonesia",
        time: "February 2018",
        status: "Closed (May 2018)",
        client: "PT Namasindo Plas ",
        value: "IDR 3.9 trillion"
      },
      {
        id: "17",
        service: "Debt Restructuring & Turnaround Management",
        name: "Monitoring Accountant LPG Company ",
        country: "Indonesia",
        time: "December 2017",
        status: "Ongoing",
        client: "Confidential",
        value: "USD 92.5 million"
      },
      {
        id: "18",
        service: "Corporate Initiative Management and Support",
        name: "Commercial Due Diligence of a Gas Distribution Company",
        country: "Indonesia",
        time: "November 2017",
        status: "Closed (April 2018)",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "19",
        service: "Corporate Initiative Management and Support",
        name: "Valuation of a Contingent Liability Instrument",
        country: "Indonesia",
        time: "September 2017",
        status: "Closed (January 2018)",
        client: "Confidential",
        value: "USD 100 million"
      },
      {
        id: "20",
        service: "Debt Restructuring & Turnaround Management",
        name: "Post-PKPU Turn Around Management and CRO",
        country: "Indonesia",
        time: "August 2017",
        status: "Ongoing",
        client: "Sujaya Group",
        value: "IDR 3.2 trillion"
      },
      {
        id: "21",
        service: "Financial Investigations and Litigation Support",
        name: "Court Appointed Liquidator and Third Party Litigation Funding",
        country: "Singapore",
        time: "July 2017",
        status: "Ongoing",
        client: "Trikomsel Singapore Pte Ltd (In Compulsory Liquidation)",
        value: "SGD 225 million"
      },
      {
        id: "22",
        service: "Debt Restructuring & Turnaround Management",
        name: "Voluntary Restructuring LPG Company ",
        country: "Indonesia",
        time: "May 2017",
        status: "Closed (March 2018)",
        client: "Confidential",
        value: "USD 92.5 million"
      },
      {
        id: "23",
        service: "Corporate Initiative Management and Support",
        name: "Equity Right and MCB Issuance",
        country: "Singapore",
        time: "April 2017",
        status: "Closed (July 2017)",
        client: "PT. Bumi Resources Tbk ",
        value: "USD 2.6 billion"
      },
      {
        id: "24",
        service: "Liquidation Receivership and Court Appointments",
        name: "Court Appointed Liquidator of a Distressed Shipping Company ",
        country: "Singapore",
        time: "January 2017",
        status: "Ongoing",
        client:
          "Siva Ships International Pte Limited (In Compulsory Liquidation)",
        value: "USD 3 billion"
      },
      {
        id: "25",
        service: "Liquidation Receivership and Court Appointments",
        name: "Court Appointed Liquidator of a Distressed Shipping Company",
        country: "Singapore",
        time: "December 2016",
        status: "Ongoing",
        client: "Siva Bulk Limited (In Compulsory Liquidation)",
        value: "USD 3 billion"
      },
      {
        id: "26",
        service: "Liquidation Receivership and Court Appointments",
        name:
          "Creditors Voluntary Liquidator of a Ride-Hailing Business in Singapore",
        country: "Singapore",
        time: "November 2016",
        status: "Closed (December 2017)",
        client: "Karhoo Singapore, Pte Ltd",
        value: "N/A"
      },
      {
        id: "27",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Farm and Feed Company",
        country: "Indonesia",
        time: "October 2016",
        status: "Closed (July 2017)",
        client: "Sujaya Group",
        value: "IDR 3.2 trillion"
      },
      {
        id: "28",
        service: "M&A Advisory and Fund Raising",
        name: "M&A Advisory of Oil & Gas Companies",
        country: "Indonesia",
        time: "July 2016",
        status: "Closed (January 2017)",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "29",
        service: "M&A Advisory and Fund Raising",
        name:
          "Corporate Restructuring and Fund Raising of Assisted Reproductive Technology Company",
        country: "Indonesia",
        time: "May 2016",
        status: "Ongoing",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "30",
        service: "Creditor Support & Advisory",
        name:
          "Creditor Support and Advisory of Sugar Milling business in Vietnam",
        country: "Singapore",
        time: "April 2016",
        status: "Closed (June 2017)",
        client: "Confidential",
        value: "USD 250 million"
      },
      {
        id: "31",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Coal Company ",
        country: "Indonesia",
        time: "April 2016",
        status: "Closed (November 2016)",
        client: "PT. Bumi Resources Tbk",
        value: "USD 7 billion"
      },
      {
        id: "32",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Packaging Company",
        country: "Indonesia",
        time: "April 2016",
        status: "Closed (January 2017)",
        client: "PT. Dwi Aneka Jaya Kemasindo Tbk ",
        value: "IDR 1.2 trillion"
      },
      {
        id: "33",
        service: "Creditor Support & Advisory",
        name:
          "Creditor Support and Advisory of Power Vendor Company Debt Restructuring",
        country: "Indonesia",
        time: "April 2016",
        status: "Closed (June 2017)",
        client: "Confidential",
        value: "USD 191.3 million"
      },
      {
        id: "34",
        service: "M&A Advisory and Fund Raising",
        name: "Sell-Side Advisory of Payment Gateway",
        country: "Indonesia",
        time: "April 2016",
        status: "Closed (July 2018)",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "35",
        service: "M&A Advisory and Fund Raising",
        name: "Fund Raising of CNG/LNG Companies",
        country: "Indonesia",
        time: "January 2016",
        status: "Closed (January 2017)",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "36",
        service: "Debt Restructuring & Turnaround Management",
        name:
          "PKPU Implementation and Transaction Support of Tea Plantation and Trading Company",
        country: "Indonesia",
        time: "November 2015",
        status: "Closed (March 2016)",
        client: "PT. Sariwangi Agriculture Estates Agency",
        value: "USD 107 million"
      },
      {
        id: "37",
        service: "Creditor Support & Advisory",
        name: "Creditor Support and Advisory of Coal Company ",
        country: "Indonesia",
        time: "July 2015",
        status: "Closed (March 2016)",
        client: "Confidential",
        value: "USD 25 million"
      },
      {
        id: "38",
        service: "Corporate Initiative Management and Support",
        name:
          "Transaction Support of Shares and Notes Acquisition of Petrochemical Company",
        country: "Indonesia",
        time: "June 2015",
        status: "Closed (October 2015)",
        client: "Confidential",
        value: "USD 290 million"
      },
      {
        id: 39,
        service: "Debt Restructuring & Turnaround Management",
        name: "Debt Restructuring of Automotive Company",
        country: "Indonesia",
        time: "May 2015",
        status: "Closed (December 2015)",
        client: "Confidential",
        value: "IDR 200 billion"
      },
      {
        id: 40,
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Tea Plantation and Trading Company",
        country: "Indonesia",
        time: "May 2015",
        status: "Closed (October 2015)",
        client: "PT. Sariwangi Agricultural Estates Agency",
        value: "USD 107 million"
      },
      {
        id: "41",
        service: "Corporate Initiative Management and Support",
        name: "Commercial Due Diligence of Furniture Companies",
        country: "Indonesia",
        time: "January 2015",
        status: "Closed (October 2015)",
        client: "Confidential",
        value: "N/A"
      },
      {
        id: "42",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Telco Company",
        country: "Indonesia",
        time: "October 2014",
        status: "Closed (December 2014)",
        client: "PT. Bakrie Telecom Tbk.",
        value: "IDR 12 trillion"
      },
      {
        id: "43",
        service: "Debt Restructuring & Turnaround Management",
        name:
          "PKPU Implementation Transaction Support of Petrochemical Company",
        country: "Indonesia",
        time: "February 2013",
        status: "Closed (December 2014)",
        client: "PT. Trans-Pacific Petrochemical Indonesia",
        value: "USD 1.5 billion"
      },
      {
        id: "44",
        service: "M&A Advisory and Fund Raising",
        name: "Fundraising for Natural Ingredient Producer",
        country: "Indonesia",
        time: "February 2013",
        status: "Closed (March 2014)",
        client: "Confidential",
        value: "USD 31.5 million"
      },
      {
        id: "45",
        service: "Corporate Initiative Management and Support",
        name: "Valuation Service of Coal Company",
        country: "Indonesia",
        time: "January 2013",
        status: "Closed (May 2013)",
        client: "PT. Sembawang Development PTE. LTD.",
        value: "USD 111 million"
      },
      {
        id: "46",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Petrochemical Company",
        country: "Indonesia",
        time: "November 2012",
        status: "Closed (December 2012)",
        client: "PT. Trans-Pacific Petrochemical Indonesia",
        value: "USD 1.9 billion"
      },
      {
        id: "47",
        service: "M&A Advisory and Fund Raising",
        name: "Fund Raising for Toll Road Companies",
        country: "Indonesia",
        time: "June 2011",
        status: "Closed (August 2013)",
        client: "Confidential",
        value: "IDR 5 trillion"
      },
      {
        id: "48",
        service: "Debt Restructuring & Turnaround Management",
        name: "PKPU Debt Restructuring of Airline Company",
        country: "Indonesia",
        time: "April 2011",
        status: "Closed (August 2011)",
        client: "PT. Mandala Airlines ",
        value: "IDR 2.5 trillion"
      },
      {
        id: "49",
        service: "M&A Advisory and Fund Raising",
        name: "Acquisition Support of Coal Company",
        country: "Indonesia",
        time: "October 2010",
        status: "Closed (March 2011)",
        client: "PT. Bumi Resources Tbk",
        value: "USD 3 billion"
      },
      {
        id: "50",
        service: "M&A Advisory and Fund Raising",
        name: "Acquisition of Directory and Call Center Services Company",
        country: "Indonesia",
        time: "February 2008",
        status: "Closed (June 2009)",
        client: "PT. Multimedia Nusantara",
        value: "IDR 598 billion"
      },
      {
        id: "51",
        service: "M&A Advisory and Fund Raising",
        name: "Acquisition of Third Party Administrator in Health Insurance",
        country: "Indonesia",
        time: "March 2008",
        status: "Closed (July 2008)",
        client: "PT. Multimedia Nusantara",
        value: "IDR 128 billion"
      }
    ],
    selectedService: "All",
    selectedLoc: "All",
    service: "",
    loc: "",
    TypeofCase: "All"
    // casestudies: cases
  },
  created: function() {
    var pathArray = window.location.pathname.split("/");
    var TypeofCase = pathArray[3];
    console.log(TypeofCase);
  },
  computed: {
    // filteredCasestudies: function() {
    //   if (TypeofCase === "All") {
    //     return casestudies;
    //   } else {
    //     return this.casestudies.filter(function(svc) {
    //       return TypeofCase === "All" || svc.TypeofCase === TypeofCase;
    //     });
    //   }
    // },
    filteredTransactions: function() {
      //var vm = this;
      var service = this.selectedService;
      var loc = this.selectedLoc;

      if (service === "All" && loc === "All") {
        //save performance, juste return the default array:
        return this.transactions;
      } else {
        return this.transactions.filter(function(trans) {
          //return the array after passimng it through the filter function:
          return (
            (service === "All" || trans.service === service) &&
            (loc === "All" || trans.country === loc)
          );
        });
      }
    },
    countRows: function() {
      var service = this.selectedService;
      var loc = this.selectedLoc;
      if (service === "All" && loc === "All") {
        return this.transactions.length;
      } else {
        return this.transactions.filter.length(function(trans) {
          return (
            (service === "All" || trans.service === service) &&
            (loc === "All" || trans.country === loc)
          );
        });
      }
    }
  }
});
