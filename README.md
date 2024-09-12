# CRUD_TecSus

## Instruções de Instalação e Execução

### Requisitos

- Docker
- Docker Compose

### Passos para executar a aplicação:

#### 1. Verificar se o Docker está instalado

**Windows/Linux**

- Abra um terminal ou prompt de comando e execute o seguinte comando:
  ```bash
  docker --version
  ```

#### 2. Verificar se o Docker Compose está instalado

**Windows/Linux**

- Execute o comando:
  ```bash
  docker-compose --version
  ```

#### 3. Clonar o repositório

**Windows/Linux**

- No terminal, execute:
  ```bash
  git clone https://github.com/RyanGripp/CRUD_TecSus.git
  ```

#### 4. Acessar o diretório do projeto

```bash
cd CRUD_TecSus
```

#### 5. Subir o ambiente com Docker Compose

- Para iniciar a aplicação, execute o comando:
  ```bash
  docker-compose up
  ```

#### 6. Acessar a aplicação no navegador

- Navegue até:
  ```bash
  http://localhost:8000
  ```

#### 7. Encerrar e remover os containers

- Para parar e remover os containers criados:
  ```bash
  docker-compose down
  ```

---

Este *README* orienta como preparar e rodar sua aplicação utilizando Docker e Docker Compose em ambientes Windows e Linux.