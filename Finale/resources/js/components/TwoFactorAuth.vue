<template>
    <div>
        <h2>
            Two Factor Authentication
        </h2>

        <confirm-password>
            <button>
                Enable
            </button>
        </confirm-password>
    </div>
</template>

<script>
import ConfirmPassword from './ConfirmPassword'

export default {
    components: {
        ConfirmPassword
    },
}
</script>
data () {
    return {
        twoFactorEnabled: false,
        qrCode: ''
    }
},

methods: {
    enableTwoFactorAuthentication () {
        axios.post('/user/two-factor-authentication')
            .then(() => {
                return Promise.all([
                    this.showQrCode()
                ])
            }).then(() => {
                this.twoFactorEnabled = true
            })
    },

    showQrCode () {
        return axios.get('/user/two-factor-qr-code')
            .then(response => {
                this.qrCode = response.data.svg
            })
    },
}
<div v-if="qrCode" v-html="qrCode" />

<confirm-password v-if="!twoFactorEnabled" @confirmed="enableTwoFactorAuthentication()">
    <button>
        Enable
    </button>
</confirm-password>

disableTwoFactorAuthentication () {
    axios.delete('/user/two-factor-authentication')
        .then(() => {
            this.twoFactorEnabled = false
            this.qrCode = ''
        })
}
<confirm-password v-else @confirmed="disableTwoFactorAuthentication()">
    <button>
        Disable
    </button>
</confirm-password>
props: {
    enabled: {
        type: Boolean,
        default: false
    }
},

data () {
    return {
        twoFactorEnabled: this.enabled,
        qrCode: ''
    }
}
