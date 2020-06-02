<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Scan QR-Code</div>

          <div class="card-body">
            <p class="error">{{ error }}</p>

            <p class="decode-result">
              Last result:
              <b>{{ result }}</b>
            </p>

            <qrcode-stream @decode="onDecode" @init="onInit" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { QrcodeStream } from "vue-qrcode-reader";
export default {
  props: {
    idJadwal: String
  },
  components: { QrcodeStream },
  data() {
    return {
      result: "",
      error: ""
    };
  },

  methods: {
    onDecode(result) {
      axios
        .post("/absensi-siswa/" + this.idJadwal, {
          id: result
        })
        .then(response => {
          if (response.data.status) {
            toastr.success(response.data.message, "Berhasil");
            this.result = result;
          } else {
            toastr.warning(response.data.message, "Gagal");
          }
        })
        .catch(error => {
          toastr.warning(error.message, "Gagal");
        });
    },

    async onInit(promise) {
      try {
        await promise;
      } catch (error) {
        if (error.name === "NotAllowedError") {
          this.error = "ERROR: you need to grant camera access permisson";
        } else if (error.name === "NotFoundError") {
          this.error = "ERROR: no camera on this device";
        } else if (error.name === "NotSupportedError") {
          this.error = "ERROR: secure context required (HTTPS, localhost)";
        } else if (error.name === "NotReadableError") {
          this.error = "ERROR: is the camera already in use?";
        } else if (error.name === "OverconstrainedError") {
          this.error = "ERROR: installed cameras are not suitable";
        } else if (error.name === "StreamApiNotSupportedError") {
          this.error = "ERROR: Stream API is not supported in this browser";
        }
      }
    }
  }
};
</script>
