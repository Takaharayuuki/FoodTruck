import { inject } from "vue";
import Swal from "sweetalert2";

const SwalSymbol = Symbol();

export function useSwal() {
  return inject(SwalSymbol);
}

export default {
  install: (app: { config: { globalProperties: { $Swal: typeof Swal; }; }; provide: (arg0: typeof SwalSymbol, arg1: typeof Swal) => void; }) => {
    app.config.globalProperties.$Swal = Swal;
    app.provide(SwalSymbol, Swal);
  }
};
