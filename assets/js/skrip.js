Vue.config.devtools = true;
Vue.component("transactions", {
  props: ["t"],
  template: `<li class="transactions">
  <p>
      <h5 v-html="t.name" class="text-green" style="margin-bottom:-20px;padding-bottom:0">
          {{ t.name }}</h5><br/>{{ t.time }}</p>
      <p class="d-sm-block d-md-none">
          <span class="text-green">Status:</span>
          {{ t.status}}<br />
          <span class="text-green">Nilai:</span>
          {{ t.value }}<br/>
          <span class="text-green">Klien:</span>
          {{ t.client }}<br />
          <span class="text-green">
              Negara:</span>
          {{ t.country }}<br/>
          <span class="text-green">Layanan:</span>
          <span v-html="t.service"></span>
      </p>
      <p class="d-none d-md-block">
            <span class="text-green">Status:</span>
            {{ t.status}}
            |
            <span class="text-green">Nilai:</span>
            {{ t.value }}<br/>
            <span class="text-green">Klien:</span>
            {{ t.client }}
            |
            <span class="text-green">
                Negara:</span>
            {{ t.country }}<br/>
            <span class="text-green">Layanan:</span>
            <span v-html="t.service"></span>
      </p>
      <hr class="event" style="margin-bottom:0px;"/>
      </li>`
});

var trans = new Vue({
  el: "#trans",
  data: {
    transactions: [
      {
        id: "1",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name: "<i>Portfolio</i> Perusahaan Telekomunikasi",
        country: "Indonesia",
        time: "Maret 2019",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "2",
        service: "Pendukung dan Penasihat Kreditor",
        name: "Restrukturisasi Surat Obligasi Perusahaan OSV Singapura",
        country: "Singapura",
        time: "Maret 2019",
        status: "Sedang berjalan",
        client: "Miclyn Express Offshore Limited",
        value: "USD 450 juta"
      },
      {
        id: "3",
        service: "Penasihat M&A dan Penggalangan Dana",
        name:
          "<i>Financial Modelling</i> dan Analisis Modal Kerja Perusahaan Infrastruktur",
        country: "Singapura",
        time: "Maret 2019",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "USD 3 miliar"
      },
      {
        id: "4",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name: "Pengembangan Rencana Bisnis Kawasan Industri ",
        country: "Indonesia",
        time: "Februari 2019",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "USD 1 miliar"
      },
      {
        id: "5",
        service: "Penasihat M&A dan Penggalangan Dana",
        name:
          "Manajemen Proyek & Penggalangan Dana Perusahaan Rintisan/<i>Start-Up</i>",
        country: "Indonesia",
        time: "Maret 2019",
        status: "Sedang berjalan",
        client: "GoHalalGo",
        value: "N/A"
      },
      {
        id: "6",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name:
          "Penasihat Perusahaan Global dalam Pelaporan Keuangan Terintegrasi sebagai Persiapan Penggalangan Dana",
        country: "Singapura",
        time: "Oktober 2018",
        status: "Selesai",
        client: "Rahasia",
        value: "USD 80 juta"
      },
      {
        id: "7",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "Restrukturisasi Sukarela Perusahaan Batu Bara",
        country: "Indonesia",
        time: "September 2018",
        status: "Selesai (Desember 2018)",
        client: "Rahasia",
        value: "USD 60 juta"
      },
      {
        id: "8",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "Restrukturisasi Sukarela Perusahaan LPG",
        country: "Indonesia",
        time: "Agustus 2018",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "USD 40 juta"
      },
      {
        id: "9",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Perusahaan Pembiayaan",
        country: "Indonesia",
        time: "Agustus 2018",
        status: "Selesai (Oktober 2018)",
        client: "PT Sunprima Nusantara Pembiayaan",
        value: "IDR 4,1 triliun"
      },
      {
        id: "10",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "Restrukturisasi Sukarela Perusahaan <i>Smart-Card</i>",
        country: "Indonesia",
        time: "Juli 2018",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "IDR 840 miliar"
      },
      {
        id: "11",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "Restrukturisasi Sukarela Perusahaan Pengeboran Minyak & Gas",
        country: "Indonesia",
        time: "Juli 2018",
        status: "Sedang berjalan",
        client: "PT Apexindo Pratama Duta Tbk",
        value: "USD 319,7 juta"
      },
      {
        id: "12",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Perusahaan Manufaktur Botol Plastik II",
        country: "Indonesia",
        time: "Juni 2018",
        status: "Selesai (Juli 2018)",
        client: "PT Namasindo Plas Abadi & Afiliasi",
        value: "IDR 1,7 triliun"
      },
      {
        id: "13",
        service: "Pendukung dan Penasihat Kreditor",
        name: "Penasihat Pemegang Surat Obligasi dari Perusahaan Perkapalan",
        country: "Singapura",
        time: "Juni 2018",
        status: "Selesai (November 2018)",
        client: "Rahasia",
        value: "SGD 100 juta"
      },
      {
        id: "14",
        service: "Likuidasi, Pemberesan dan Penunjukan Pengadilan",
        name:
          "Penutupan Sukarela oleh Kreditor terhadap Perusahaan Asuransi UK",
        country: "Singapura",
        time: "Mei 2018",
        status: "Selesai (Januari 2019)",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "15",
        service: "Likuidasi, Pemberesan dan Penunjukan Pengadilan",
        name:
          "Representatif Asia dan Agen Likuidasi dari Wali Amanat Kepailitan Amerika Serikat <i>(United States Bankruptcy Trustee - Chapter 7)</i>",
        country: "Singapura",
        time: "Februari 2018",
        status: "Sedang berjalan",
        client: "Zetta Jet Pte Ltd",
        value: "N/A"
      },
      {
        id: "16",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Perusahaan Manufaktur Botol Plastik I",
        country: "Indonesia",
        time: "Februari 2018",
        status: "Selesai (Mei 2018)",
        client: "PT Namasindo Plas ",
        value: "IDR 3,9 triliun"
      },
      {
        id: "17",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "<i>Monitoring Accountant</i> Perusahaan LPG",
        country: "Indonesia",
        time: "Desember 2017",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "USD 92,5 juta"
      },
      {
        id: "8",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name:
          "Uji Tuntas/<i>Due Diligence</i> Komersial Perusahaan Distribusi Gas",
        country: "Indonesia",
        time: "November 2017",
        status: "Selesai (April 2018)",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "19",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name: "Jasa Penilaian Instrumen Kewajiban Kontingensi",
        country: "Indonesia",
        time: "September 2017",
        status: "Selesai (Januari 2018)",
        client: "Rahasia",
        value: "USD 100 juta"
      },
      {
        id: "20",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name:
          "Implementasi PKPU: <i>Turnaround Management</i> dan <i>Chief Restructuring Officer</i>",
        country: "Indonesia",
        time: "Agustus 2017",
        status: "Sedang berjalan",
        client: "Sujaya Group ",
        value: "IDR 3,2 triliun"
      },
      {
        id: "21",
        service: "Investigasi Keuangan dan Dukungan Litigasi",
        name: "Kurator dan Pendanaan Litigasi Pihak Ketiga",
        country: "Singapura",
        time: "Juli 2017",
        status: "Sedang berjalan",
        client: "Trikomsel Singapore Pte Ltd (dalam likuidasi)",
        value: "SGD 225 juta"
      },
      {
        id: "22",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "Restrukturisasi Sukarela Perusahaan LPG ",
        country: "Indonesia",
        time: "Mei 2017",
        status: "Selesai (Maret 2018)",
        client: "Rahasia",
        value: "USD 92,5 juta"
      },
      {
        id: "23",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name: "<i>Rights Issue</i> dan Penerbitan Obligasi Wajib Konversi",
        country: "Indonesia",
        time: "April 2017",
        status: "Selesai (Juli 2017)",
        client: "PT. Bumi Resources Tbk ",
        value: "USD 2,6 miliar"
      },
      {
        id: "24",
        service: "Likuidasi, Pemberesan dan Penunjukan Pengadilan",
        name: "Kurator untuk Perusahaan Perkapalan ",
        country: "Singapura",
        time: "Januari 2017",
        status: "Sedang berjalan",
        client: "Siva Ships International Pte Limited (dalam likuidasi)",
        value: "USD 3 miliar"
      },
      {
        id: "25",
        service: "Likuidasi, Pemberesan dan Penunjukan Pengadilan",
        name: "Kurator untuk Perusahaan Perkapalan",
        country: "Singapura",
        time: "Desember 2016",
        status: "Sedang berjalan",
        client: "Siva Bulk Limited (dalam likuidasi)",
        value: "USD 3 miliar"
      },
      {
        id: "26",
        service: "Likuidasi, Pemberesan dan Penunjukan Pengadilan",
        name:
          "Likuidator dari Perusahaan Transportasi/<i>Ride-Hailing</i> di Singapura",
        country: "Singapura",
        time: "November 2016",
        status: "Selesai (Desember 2017)",
        client: "Karhoo Singapore Pte Ltd",
        value: "N/A"
      },
      {
        id: "27",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name:
          "PKPU Rekstrukturisasi Utang Perusahaan Peternakan dan Pakan Ternak",
        country: "Indonesia",
        time: "Oktober 2016",
        status: "Selesai (Juli 2017)",
        client: "Sujaya Group",
        value: "IDR 3,2 triliun"
      },
      {
        id: "28",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Konsultasi M&A Perusahaan Gas",
        country: "Indonesia",
        time: "Juli 2016",
        status: "Selesai (Januari 2017)",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "29",
        service: "Penasihat M&A dan Penggalangan Dana",
        name:
          "Restrukturisasi Perusahaan dan Penggalangan Dana atas Perusahaan Teknologi Bantuan Reproduksi",
        country: "Indonesia",
        time: "Mei 2016",
        status: "Sedang berjalan",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "30",
        service: "Pendukung dan Penasihat Kreditor",
        name: "Penasihat Kreditor dari Perusahaan Penggilingan Gula di Vietnam",
        country: "Singapura",
        time: "April 2016",
        status: "Selesai (Juni 2017)",
        client: "Rahasia",
        value: "USD 250 juta"
      },
      {
        id: "31",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Restrukturisasi Utang Perusahaan Batubara ",
        country: "Indonesia",
        time: "April 2016",
        status: "Selesai (November 2016)",
        client: "PT. Bumi Resources Tbk ",
        value: "USD 7 miliar"
      },
      {
        id: "32",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Restrukturisasi Utang Perusahaan Pengemasan ",
        country: "Indonesia",
        time: "April 2016",
        status: "Selesai (Januari 2017)",
        client: "PT. Dwi Aneka Jaya Kemasindo Tbk ",
        value: "IDR 1,2 triliun"
      },
      {
        id: "33",
        service: "Pendukung dan Penasihat Kreditor",
        name:
          "Penasihat Kreditor dalam Restrukrisasi Utang Perusahaan Penyedia Daya",
        country: "Indonesia",
        time: "April 2016",
        status: "Selesai (Juni 2017)",
        client: "Rahasia",
        value: "USD 191,3 juta"
      },
      {
        id: "34",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "<i>Sell-Side Advisory</i> untuk Perusahaan Gerbang Pembayaran",
        country: "Indonesia",
        time: "April 2016",
        status: "Selesai (Juli 2018)",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "35",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Penggalangan Dana untuk Perusahaan CNG/LNG",
        country: "Indonesia",
        time: "Januari 2016",
        status: "Selesai (January 2017)",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "36",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name:
          "Dukungan Transaksi dan Implementasi PKPU Perusahaan Perkebunan dan Perdagangan Teh",
        country: "Indonesia",
        time: "November 2015",
        status: "Selesai (Maret 2016)",
        client: "PT. Sariwangi Agriculture Estates Agency",
        value: "USD 107 juta"
      },
      {
        id: "37",
        service: "Pendukung dan Penasihat Kreditor",
        name: "Pendukung dan Penasihat Kreditor Perusahaan Batubara",
        country: "Indonesia",
        time: "Juli 2015",
        status: "Selesai (Maret 2016)",
        client: "Rahasia",
        value: "USD 25 juta"
      },
      {
        id: "38",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name:
          "Dukungan Transaksi Akuisisi Saham dan Surat Utang Perusahaan Petrokimia ",
        country: "Indonesia",
        time: "Juni 2015",
        status: "Selesai (Oktober 2015)",
        client: "Rahasia",
        value: "USD 290 juta"
      },
      {
        id: "39",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "Restrukturisasi Utang Perusahaan Otomotif ",
        country: "Indonesia",
        time: "Mei 2015",
        status: "Selesai (Desember 2015)",
        client: "Rahasia",
        value: "IDR 200 miliar"
      },
      {
        id: "40",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Perusahaan Perkebunan dan Perdagangan teh ",
        country: "Indonesia",
        time: "Mei 2015",
        status: "Selesai (Oktober 2015)",
        client: "PT. Sariwangi Agricultural Estates Agency ",
        value: "USD 107 juta"
      },
      {
        id: "41",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name: "Uji Tuntas Komersial Perusahaan Perabotan ",
        country: "Indonesia",
        time: "Januari 2015",
        status: "Selesai (Oktober 2015)",
        client: "Rahasia",
        value: "N/A"
      },
      {
        id: "42",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Restrukturisasi Utang Perusahaan Telekomunikasi",
        country: "Indonesia",
        time: "Oktober 2014",
        status: "Selesai (Desember 2014)",
        client: "PT. Bakrie Telecom Tbk. ",
        value: "IDR 12 triliun"
      },
      {
        id: "43",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name:
          "Dukungan Transaksi dan Implementasi PKPU Perusahaan Petrokimia  ",
        country: "Indonesia",
        time: "Februari 2013",
        status: "Selesai (Desember 2014)",
        client: "PT. Trans-Pacific Petrochemical Indonesia ",
        value: "USD 1,5 miliar"
      },
      {
        id: "44",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Penggalangan Dana Produsen Bahan Alami ",
        country: "Indonesia",
        time: "Februari 2013",
        status: "Selesai (Maret 2014)",
        client: "Rahasia",
        value: "USD 31,5 juta"
      },
      {
        id: "45",
        service: "Manajemen Inisiatif dan Pendukung Perusahaan",
        name: "Jasa Penilaian untuk Perusahaan Batubara",
        country: "Indonesia",
        time: "Januari 2013",
        status: "Selesai (Mei 2013)",
        client: "PT. Sembawang Development Pte. Ltd. ",
        value: "USD 111 juta"
      },
      {
        id: "46",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Restrukturisasi Utang Perusahaan Petrokimia ",
        country: "Indonesia",
        time: "November 2012",
        status: "Selesai (Desember 2012)",
        client: "PT. Trans-Pacific Petrochemical Indonesia",
        value: "USD 1,9 miliar"
      },
      {
        id: "47",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Penggalangan Dana Perusahaan Jalan Tol  ",
        country: "Indonesia",
        time: "Juni 2011",
        status: "Selesai (Agustus 2013)",
        client: "Rahasia",
        value: "IDR 5 triliun"
      },
      {
        id: "48",
        service: "Restrukturisasi Utang dan <i>Turnaround Management</i>",
        name: "PKPU Restrukturisasi Utang Maskapai Penerbangan ",
        country: "Indonesia",
        time: "April 2011",
        status: "Selesai (Agustus 2011)",
        client: "PT. Mandala Airlines ",
        value: "IDR 2,5 triliun"
      },
      {
        id: "49",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Dukungan Akuisisi atas Perusahaan Batubara ",
        country: "Indonesia",
        time: "Oktober 2010",
        status: "Selesai (Maret 2011)",
        client: "PT. Bumi Resources Tbk",
        value: "USD 3 miliar"
      },
      {
        id: "50",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Akuisisi Perusahaan Layanan Direktori dan <i>Call Center</i>",
        country: "Indonesia",
        time: "Februari 2008",
        status: "Selesai (Juni 2009)",
        client: "PT. Multimedia Nusantara",
        value: "IDR 598 miliar"
      },
      {
        id: "51",
        service: "Penasihat M&A dan Penggalangan Dana",
        name: "Akuisisi Perusahaan Administrator Pihak Ketiga untuk Asuransi",
        country: "Indonesia",
        time: "Maret 2008",
        status: "Selesai (Juli 2008)",
        client: "PT. Multimedia Nusantara",
        value: "IDR 128 miliar"
      }
    ],
    selectedService: "All",
    selectedLoc: "All",
    service: "",
    loc: "",
    TypeofCase: "All"
  },
  created: function() {
    var pathArray = window.location.pathname.split("/");
    var TypeofCase = pathArray[3];
    console.log(TypeofCase);
  },
  computed: {
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
