<script setup>
import { getImagePathJpeg } from "../utils/getImagePathJpeg";

defineProps({
    title: {
        type: String,
        required: true,
    },
    price: {
        required: true,
    },

    imageLink: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="baseShopCard-container">
        <div class="baseShopCard-image-container">
            <img
                class="baseShopCard-image"
                :src="getImagePathJpeg(imageLink)"
            />
        </div>
        <div class="baseShopCard-title">
            <p class="small-description">{{ title }}</p>
        </div>
        <div class="baseShopCard-price">
            <svg
                width="14"
                height="15"
                viewBox="0 0 14 15"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M7.00292 13.3351C3.78117 13.3351 1.16959 10.7235 1.16959 7.50175C1.16959 4.27999 3.78117 1.66841 7.00292 1.66841C10.2247 1.66841 12.8363 4.27999 12.8363 7.50175C12.8363 10.7235 10.2247 13.3351 7.00292 13.3351ZM7.00292 12.1684C8.2406 12.1684 9.42758 11.6767 10.3028 10.8016C11.1779 9.92641 11.6696 8.73942 11.6696 7.50175C11.6696 6.26407 11.1779 5.07708 10.3028 4.20191C9.42758 3.32674 8.2406 2.83508 7.00292 2.83508C5.76524 2.83508 4.57826 3.32674 3.70309 4.20191C2.82792 5.07708 2.33625 6.26407 2.33625 7.50175C2.33625 8.73942 2.82792 9.92641 3.70309 10.8016C4.57826 11.6767 5.76524 12.1684 7.00292 12.1684ZM7.00292 4.61424L9.89042 7.50175L7.00292 10.3892L4.11542 7.50175L7.00292 4.61424ZM7.00292 6.26449L5.76567 7.50116L7.00234 8.73899L8.24017 7.50175L7.00292 6.26449Z"
                    fill="white"
                />
            </svg>
            <p class="label">{{ price }}</p>
        </div>
    </div>
</template>

<!-- css : BaseShopCard.css -->
