import "./bootstrap";
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";

Alpine.store("global", {
    notificationsDrawerOpen: false,
});

Livewire.start();
