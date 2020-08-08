// custom function
			/* Padding zero with numbers*/
			function pad(n, width, z) {
			  z = z || '0';
			  n = n + '';
			  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
			}
			/* Add Months in date*/
			
			Date.prototype.addMonths = function (m) {
				var d = new Date(this);
				var years = Math.floor(m / 12);
				var months = m - (years * 12);
				if (years) d.setFullYear(d.getFullYear() + years);
				if (months) d.setMonth(d.getMonth() + months);
				return d;
			}