import React from 'react';
import './index.css';
import Header from './components/Header'; // Tu menú lateral
import Checkout from './components/Checkout';
import Verificacion from './components/Verificacion';

function App() {
  return (
    <div className="app-container">
      
      {/* =========================================
          PÁGINA PRINCIPAL (OCULTA TEMPORALMENTE)
          ========================================= */}
      {/* 
      <Header/>
      <section className="hero">
        <div className="hero-text">
          <h1>Compra tus <span>Fondos Digitales</span></h1>
          <div className="raffle-alert">
            ¡Y participa automáticamente en el gran sorteo!
          </div>
          <p style={{ color: '#aaa', marginBottom: '20px' }}>
            Adquiere diseños exclusivos de fútbol épico. A más compras, más tickets generados a tu nombre.
          </p>

          <div style={{ fontSize: '16px', marginBottom: '30px', lineHeight: '1.6' }}>
            <p>✅ Compra 100% segura por Webpay/MercadoPago</p>
            <p>⚽ Ticket digital enviado a tu correo</p>
            <p>🏆 Sorteo certificado ante notario</p>
          </div>
          <a href="#productos" className="btn btn-primary" style={{ display: 'inline-block', padding: '15px 40px' }}>
            Comprar y Participar
          </a>
        </div>

        <div className="hero-image-placeholder">
          [FOTO DE JUGADOR / IMAGEN PUBLICITARIA PRINCIPAL]
        </div>
      </section>

      <section className="prizes-section">
        <h2> Al comprar, participas por estos premios </h2>
        <p>¡Mientras más fondos colecciones, más oportunidades tienes de ganar!</p>

        <div className="prizes-grid">
          <div className="prize-placeholder">
            [IMAGEN PREMIO 1 <br /> Ej: Consola / Viaje]
          </div>
          <div className="prize-placeholder">
            [IMAGEN PREMIO 2 <br /> Ej: Camiseta autografiada]
          </div>
          <div className="prize-placeholder">
            [IMAGEN PREMIO 3 <br /> Ej: Entradas al estadio]
          </div>
        </div>
      </section>

      <section className="action-buttons">
        <a href="#" className="btn btn-secondary"> Verificar mi Ticket</a>
        <a href="#" className="btn btn-secondary"> Ver Bases Legales</a>
      </section>

      <section id="productos" className="products">
        <h2>Elige tu pack de fondos</h2>
        <p style={{ color: '#555' }}>Selecciona tu producto. El número de ticket se generará tras el pago exitoso.</p>

        <div className="products-grid">
          <div className="product-card">
            <h3 className="product-title">1X FONDO</h3>
            <p className="product-price">$3.000</p>
            <div className="product-image">
              [IMAGEN MUESTRA FONDO 1]
            </div>
            <button className="btn btn-buy">COMPRAR (1 TICKET)</button>
          </div>

          <div className="product-card">
            <h3 className="product-title">PACK X4 FONDOS</h3>
            <p className="product-price">$10.000</p>
            <div className="product-image" style={{ borderColor: 'var(--color-blue)', borderStyle: 'solid' }}>
              [IMAGEN MUESTRA PACK 4 FONDOS]
            </div>
            <div style={{ display: 'flex', justifyContent: 'space-between', fontSize: '13px', marginBottom: '15px', fontWeight: 'bold' }}>
              <span style={{ color: 'var(--color-blue)' }}>AHORRAS $2.000</span>
              <span style={{ color: 'var(--color-green)' }}>4 TICKETS PARA EL SORTEO</span>
            </div>
            <button className="btn btn-buy" style={{ backgroundColor: 'var(--color-blue)' }}>COMPRAR PACK X4</button>
          </div>
        </div>
      </section>

      <footer>
        <div className="logo-placeholder" style={{ margin: '0 auto 20px', width: '100px', height: '40px', fontSize: '10px' }}>
          [LOGO CHICO]
        </div>
        <div className="footer-links">
          <a href="#">Contactar por WhatsApp</a>
          <a href="#">Políticas de Privacidad</a>
          <a href="#">Términos y Condiciones</a>
          <a href="#">Instagram @ElConconino</a>
        </div>
        <p style={{ color: '#444', fontSize: '12px', marginTop: '20px' }}>
          © 2026 El Conconino. Todos los derechos reservados.
        </p>
      </footer>
      */}

      {/* =========================================
          VISTAS ACTIVAS (DEJA SOLO UNA DESCOMENTADA)
          ========================================= */}
      
      <Checkout /> 
      {/*<Verificacion /> */}

    </div>
  );
}

export default App;