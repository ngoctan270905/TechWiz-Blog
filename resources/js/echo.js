import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

// Lấy CSRF token từ meta trong <head>
const csrfToken =
    document.head.querySelector('meta[name="csrf-token"]')?.content || "";

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,

    // Cấu hình WebSocket (dành cho Soketi hoặc Laravel WebSockets)
    wsHost: import.meta.env.VITE_PUSHER_HOST,
    wsPort: import.meta.env.VITE_PUSHER_PORT,
    wssPort: import.meta.env.VITE_PUSHER_PORT,
    enabledTransports: ["ws", "wss"],

    // Xác thực private/presence channel
    auth: {
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        withCredentials: true,
    },

    enableStats: false,
});
