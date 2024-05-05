import axios from "axios";
import confetti from "canvas-confetti";

window.axios = axios;
window.confetti = confetti;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
