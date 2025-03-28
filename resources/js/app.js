import './bootstrap';

import Alpine from 'alpinejs';
import waybillComponent from './waybill';

window.Alpine = Alpine;
Alpine.data('waybillComponent', waybillComponent);

Alpine.start();
