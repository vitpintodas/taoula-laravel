<template>
    <div class="notification-container">
      <h2 class="titre">Notifications</h2>
      <p class="texte-notif textes marginB description">En activant tes notifications, tu seras au courant lorsque les sondages, concours ainsi que tes émissions préférées seront lancés!</p>
      <p class="textes">Activer les notifications :</p>
      <label>
        <input class="notif-checkbox" type="checkbox" v-model="notificationsEnabled" @change="toggleNotifications">
        {{ label }}
      </label>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        notificationsEnabled: false,
        label: 'Recevoir des notifications'
      };
    },
    mounted() {
      this.checkNotificationPermission();
    },
    methods: {
      checkNotificationPermission() {
        if (Notification.permission === 'granted') {
          this.notificationsEnabled = true;
        }
      },
      toggleNotifications() {
        if (this.notificationsEnabled) {
          this.requestNotificationPermission();
        } else {
          this.disableNotifications();
        }
      },
      requestNotificationPermission() {
        Notification.requestPermission().then(permission => {
          if (permission === 'granted') {
            this.enableNotifications();
          } else {
            this.notificationsEnabled = false;
          }
        });
      },
      enableNotifications() {
        if ('serviceWorker' in navigator && 'PushManager' in window) {
          navigator.serviceWorker.ready.then(registration => {
            registration.pushManager.getSubscription().then(subscription => {
              if (subscription) {
                this.savePushSubscription(subscription);
              } else {
                registration.pushManager.subscribe({
                  userVisibleOnly: true,
                  applicationServerKey: this.urlB64ToUint8Array('BJq_bkKfUtmAt7QpvHjoeVgDQtHpzs_aOTJEUrayJNoavLSgWBlDOIqAFhb7RsQDGWAbiun7cKVu6APh9wkFMeE')
                })
                .then(newSubscription => {
                  this.savePushSubscription(newSubscription);
                })
                .catch(error => {
                  console.error('Erreur lors de l\'inscription aux notifications push:', error);
                  this.notificationsEnabled = false;
                });
              }
            });
          });
        } else {
          console.warn('Notifications push non prises en charge par le navigateur.');
          this.notificationsEnabled = false;
        }
      },
      disableNotifications() {
        // Supprimer l'abonnement push du serveur si nécessaire
        console.log('Abonnement push supprimé');
      },
      urlB64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
        const base64 = (base64String + padding)
          .replace(/\-/g, '+')
          .replace(/_/g, '/');
  
        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);
  
        for (let i = 0; i < rawData.length; ++i) {
          outputArray[i] = rawData.charCodeAt(i);
        }
  
        return outputArray;
      },
      savePushSubscription(subscription) {
        // Enregistrer l'abonnement push sur le serveur si nécessaire
        console.log('Abonnement push enregistré:', subscription);
      }
    }
  };
  </script>
  
  <style scoped>
  .notification-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 80vh;
    text-align: center;
    margin-left: 10px;
    margin-right: 10px;
  }
  
  .titre {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .texte-notif {
    font-size: 18px;
    margin-bottom: 20px;
  }
  
  .textes {
    font-size: 16px;
    margin-bottom: 10px;
  }
  
  .notif-checkbox {
    margin-right: 5px;
  }
  </style>
  