CYAN='\033[0;36m'
GREEN='\033[0;32m'
NC='\033[0m'

echo "${CYAN}Checking if containers somehow exist${NC}"
docker rm shifty-pgsql
docker rm shifty

echo "${CYAN}Running Postgres container${NC}"
docker run --rm --name shifty-pgsql -d postgres

echo "${CYAN}Building shifty container, this can take a while${NC}"
docker build -t shifty .
echo "${GREEN}Build complete!${NC}"
echo "${CYAN}Running application!${NC}"
docker run -t -i -p 8080:8080 --rm --name shifty --link shifty-pgsql:shifty-pgsql shifty
