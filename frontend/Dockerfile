FROM node:lts-alpine

# Set the working directory
WORKDIR /app

# Install app dependencies
COPY package.json package-lock.json ./

# Install dependencies as the node user (safer than root)
RUN npm install

# Install global dependencies
RUN npm install -g serve

# Copy the app source code
COPY . ./

# Ensure that the app files are owned by the correct user
RUN chown -R node:node /app

# Switch to the node user
USER node

# Expose port 8080
EXPOSE 8080

# Start the app
CMD ["npm", "run", "dev"]
