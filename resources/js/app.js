import Alpine from 'alpinejs'
import trap from '@alpinejs/trap'

import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import internationalNumber from './plugins/internationalNumber'
import mapBox from './plugins/mapBox'
import './helpers/string'
import './helpers/trix'

window.Alpine = Alpine

Alpine.data('internationalNumber', internationalNumber)
Alpine.data('mapBox', mapBox)

Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(trap)

Alpine.start()
