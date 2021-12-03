import Alpine from 'alpinejs'

import './helpers/string'
import './helpers/trix'
import internationalNumber from './plugins/internationalNumber'
import mapBox from './plugins/mapBox'

window.Alpine = Alpine

Alpine.data('internationalNumber', internationalNumber)
Alpine.data('mapBox', mapBox)

Alpine.start()
