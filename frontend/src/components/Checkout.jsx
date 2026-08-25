import React from 'react';

function Checkout() {
  return (
    <div className="checkout-wrapper">
      <header>
        <div className="logo-placeholder">
          [LOGO EL CONCONINO]
        </div>
        <div style={{ color: 'var(--text-muted)', fontSize: '14px' }}>
          🔒 Pago 100% Seguro
        </div>
      </header>

      <div className="checkout-container">
        {/* LADO IZQUIERDO: FORMULARIOS */}
        <div className="checkout-left">
          <div className="section-box">
            <h2>1. Datos de Contacto</h2>
            <div className="form-group">
              <label>Correo electrónico</label>
              <input type="email" placeholder="tu@correo.com" />
            </div>
            <div className="checkbox-group">
              <input type="checkbox" id="terms" />
              <label htmlFor="terms" style={{ margin: 0 }}>Acepto términos y Condiciones</label>
            </div>
          </div>

          <div className="section-box">
            <h2>2. Pago</h2>
            <p style={{ fontSize: '12px', color: 'var(--text-muted)', marginBottom: '15px' }}>
              Todas las transacciones son seguras y están encriptadas.
            </p>
            <div className="payment-box">
              <div className="payment-icons">
                <div className="icon-placeholder" style={{ background: '#00a1e0' }}>WP</div>
                <div className="icon-placeholder" style={{ background: '#142c8e' }}>VISA</div>
                <div className="icon-placeholder" style={{ background: '#ff5f00' }}>MC</div>
              </div>
              <strong>Paga con Tarjeta débito y crédito</strong>
              <p>Se te redirigirá a Paga con Tarjeta débito y crédito para que completes la compra.</p>
            </div>
          </div>

          <div className="section-box">
            <h2>3. Dirección de facturación</h2>
            <div className="form-group">
              <label>País / Región</label>
              <select>
                <option>Chile</option>
              </select>
            </div>
            <div className="form-row">
              <div className="form-group">
                <label>Nombre</label>
                <input type="text" placeholder="Nombre" />
              </div>
              <div className="form-group">
                <label>Apellidos</label>
                <input type="text" placeholder="Apellidos" />
              </div>
            </div>
            <div className="form-group">
              <label>Dirección</label>
              <input type="text" placeholder="Dirección" />
            </div>
            <div className="form-group">
              <label>Casa, apartamento, etc. (opcional)</label>
              <input type="text" placeholder="Casa, apartamento, etc." />
            </div>
            <div className="form-row">
              <div className="form-group">
                <label>Código postal (opcional)</label>
                <input type="text" placeholder="Código postal" />
              </div>
              <div className="form-group">
                <label>Ciudad</label>
                <input type="text" placeholder="Ciudad" />
              </div>
            </div>
            <div className="form-row">
              <div className="form-group">
                <label>Región</label>
                <select>
                  <option>Valparaíso</option>
                  <option>Metropolitana</option>
                </select>
              </div>
              <div className="form-group">
                <label>Teléfono</label>
                <input type="tel" placeholder="Teléfono" />
              </div>
            </div>
          </div>

          <button className="btn-pay">Pagar ahora</button>
          <div className="trust-badge">
            <a href="#" style={{ color: 'var(--color-blue)', textDecoration: 'none', marginBottom: '10px', display: 'inline-block' }}>
              Política de privacidad
            </a>
            <br />
            This promotion is not sponsored, endorsed, administered by, or associated with Apple Inc.
          </div>
        </div>

        {/* LADO DERECHO: RESUMEN */}
        <div className="checkout-right">
          <div className="summary-box">
            <div className="product-item">
              <div className="product-thumb">
                IMG
                <div className="product-badge">3</div>
              </div>
              <div className="product-info">
                <h4>Stickers</h4>
                <p>Cambiar opciones</p>
              </div>
              <div className="product-price">$9.000</div>
            </div>

            <div className="totals">
              <div className="totals-row final">
                <span>Total</span>
                <span>
                  <span style={{ fontSize: '12px', color: 'var(--text-muted)', fontWeight: 'normal' }}>CLP</span> $9.000
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Checkout;